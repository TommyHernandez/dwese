<?php

class Subir {

    private $accion, $crearCarpeta, $destino, $extensiones, $files, $input, $maximo, $nombre, $tipos;
    private $errorPHP, $errorPropio;
    private $subido;

    /* control de errores no se ha terminado de implementar para archivos múltiples */

    const ACCION_IGNORAR = 0, ACCION_RENOMBRAR = 1, ACCION_REEMPLAZAR = 2;
    const ERROR_OK = 0, ERROR_INPUT = -1, ERROR_TAMAÑO = -2,
            ERROR_EXTENSION = -3, ERROR_CARPETA = -4, ERROR_CREARCARPETA = -5,
            ERROR_ARCHIVOEXISTE = -6, ERROR_OTRO = -7;

    function __construct($input) {
        $this->errorPHP = UPLOAD_ERR_OK;
        $this->errorPropio = Subir::ERROR_OK;
        $this->errores = 0;
        $this->accion = Subir::ACCION_IGNORAR;
        $this->crearCarpeta = false;
        $this->destino = "./";
        $this->extensiones = array();
        $this->files = $this->getInput($input);
        $this->input = $input;
        $this->maximo = 2 * 1014 * 1024;
        $this->nombre = "";
        $this->subido = false;
        $this->tipos = array();
    }

    function addExtension($extension) {
        if (is_array($extension)) {
            $this->extensiones = array_merge($this->extensiones, $extension);
        } else {
            $this->extensiones[] = $extension;
        }
    }

    function addTipo($tipo) {
        if (is_array($tipo)) {
            $this->tipos = array_merge($this->tipos, $tipo);
        } else {
            $this->tipos[] = $tipo;
        }
    }

    private function crearCarpeta() {
        if (!mkdir($this->destino, Configuracion::PERMISOS, true)) {
            return false;
        }
        return true;
    }

    function getError() {
        if ($this->errorPHP != UPLOAD_ERR_OK) {
            return $this->errorPHP;
        }
        return $this->errorPropio;
    }

    function getErrorString() {
        $mensajes = array(
            self::ERROR_OK => "Sin error",
            self::ERROR_INPUT => "No existe ningún control de tipo file con ese nombre",
            self::ERROR_TAMAÑO => "El tamaño del archivo es mayor que el máximo permitido",
            self::ERROR_EXTENSION => "La extensión del archivo no está permitida",
            self::ERROR_CARPETA => "La carpeta de destino no existe",
            self::ERROR_CREARCARPETA => "No se ha podido crear la carpeta de destino",
            self::ERROR_ARCHIVOEXISTE => "El archivo existe y la acción es no sobrescribir",
            self::ERROR_OTRO => "Error de otro tipo",
            UPLOAD_ERR_INI_SIZE => "El tamaño del archivo es mayor que upload_max_filesize",
            UPLOAD_ERR_FORM_SIZE => "El tamaño del archivo es mayor que MAX_FILE_SIZE",
            UPLOAD_ERR_PARTIAL => "El archivo no se ha terminado de subir",
            UPLOAD_ERR_NO_FILE => "El archivo no se ha subido",
            UPLOAD_ERR_NO_TMP_DIR => "No existe la carpeta temporal",
            UPLOAD_ERR_CANT_WRITE => "No se ha podido escribir el archivo temporal",
            UPLOAD_ERR_EXTENSION => "Alguna extensión instalada impide subir el archivo"
        );
        if (isset($mensajes[$this->getError()])) {
            return $mensajes[$this->getError()];
        }
        return "Error desconocido";
    }

    private function getInput($input) {
        if (isset($_FILES[$input])) {
            return $_FILES[$input];
        } else {
            $this->errorPropio = self::ERROR_INPUT;
            return null;
        }
    }

    private function isCarpeta() {
        if (!file_exists($this->destino) && !is_dir($this->destino)) {
            if ($this->crearCarpeta) {
                if (!$this->crearCarpeta()) {
                    $this->errorPropio = self::ERROR_CREARCARPETA;
                    return false;
                }
            } else {
                $this->errorPropio = self::ERROR_CARPETA;
                return false;
            }
        }
        return true;
    }

    private function isError() {
        return $this->getError() != 0;
    }

    private function isExtension($extension) {
        if (sizeof($this->extensiones) > 0 && !in_array($extension, $this->extensiones)) {
            $this->errorPropio = self::ERROR_EXTENSION;
            return false;
        }
        return true;
    }

    private function isInput() {
        if (!isset($_FILES[$this->input])) {
            $this->errorPropio = Subir::ERROR_INPUT;
            return false;
        }
        return true;
    }

    function isMultiple() {
        if ($this->isError()) {
            return null;
        }
        return is_array($this->files["name"]);
    }

    private function isTamano($archivo) {
        if ($archivo["size"] > $this->maximo) {
            $this->errorPropio = self::ERROR_TAMAÑO;
            return false;
        }
        return true;
    }

    function setAccion($accion) {
        $this->accion = $accion;
    }

    function setCrearCarpeta($crearCarpeta) {
        $this->crearCarpeta = $crearCarpeta;
    }

    function setDestino($destino) {
        $caracter = substr($destino, -1);
        if ($caracter != "/") {
            $destino.="/";
        }
        $this->destino = $destino;
    }

    function setExtension($extension) {
        if (is_array($extension)) {
            $this->extensiones = $extension;
        } else {
            unset($this->extensiones);
            $this->extensiones[] = $extension;
        }
    }

    function setMaximo($maximo) {
        $this->maximo = $maximo;
    }

    function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    function subir() {
        if (!$this->subido) {
            if (!$this->isError()) {
                $this->subido = true;
                if ($this->isMultiple()) {
                    $numArchivos = count($this->files["name"]);
                    $claves = array_keys($this->files);
                    $archivo = array();
                    for ($i = 0; $i < $numArchivos; $i++) {
                        foreach ($claves as $clave) {
                            $archivo[$clave] = $this->files[$clave][$i];
                        }
                        $this->subirArchivo($archivo);
                    }
                } else {
                    $this->subirArchivo($this->files);
                }
            }
        }
    }

    private function subirArchivo($archivo) {
        if (!$this->validar($archivo)) {
            return false;
        }
        $partes = pathinfo($archivo["name"]);
        $extension = $partes['extension'];
        $nombreOriginal = $partes['filename'];
        if (!$this->isExtension($extension)) {
            return false;
        }
        if ($this->nombre === "") {
            $nombre = $nombreOriginal;
        } else {
            $nombre = $this->nombre;
        }
        $origen = $archivo["tmp_name"];
        $destino = $this->destino . $nombre . "." . $extension;
        if ($this->accion == Subir::ACCION_REEMPLAZAR) {
            return move_uploaded_file($origen, $destino);
        } elseif ($this->accion == Subir::ACCION_IGNORAR) {
            if (file_exists($destino)) {
                $this->errorPropio = self::ERROR_ARCHIVOEXISTE;
                return false;
            }
            return move_uploaded_file($origen, $destino);
        } elseif ($this->accion == Subir::ACCION_RENOMBRAR) {
            $i = 1;
            while (file_exists($destino)) {
                $destino = $destino = $this->destino . $nombre . "_$i." . $extension;
                $i++;
            }
            return move_uploaded_file($origen, $destino);
        }
        $this->errorPropio = self::ERROR_OTRO;
        return false;
    }

    private function validar($archivo) {
        $this->errorPHP = $archivo["error"];
        if ($this->isMultiple()) {
            $this->errorPropio = self::ERROR_OK;
        }
        if ($this->isError()) {
            return false;
        }
        if (!$this->isTamano($archivo)) {
            return false;
        }
        if (!$this->isCarpeta()) {
            return false;
        }
        return true;
    }

}