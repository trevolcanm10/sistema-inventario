<?php

class Conection{
    //Conexion privada
    private $conect;

    //Constructor que guarda la conexion
    public function __construct(){
        //Variable de acceso y se crea la conexion
        $this ->conect = new mysqli('localhost','root','','inventario');
    }

    //Gestion de usuarios
    public function loginUser($email,$password){
        $validacion = $this->conect->prepare("SELECT * FROM usuarios WHERE email = ? ");
        $validacion->bind_param("s",$email);
        $validacion->execute();
        $resultado = $validacion->get_result();


        if($resultado->num_rows !=1){
            return false; //Usuario o contraseña incorrectos
        }
        $user = $resultado->fetch_assoc();

        if(password_verify($password,$user['password'])){
            return $user;
        }else{
            return false;
        }

    }

    //Registro de Usuarios
    public function registerUser($full_name,$email,$password,$role='user'){
        //Hasheamos la contraseña
        $passwordHash = password_hash($password,PASSWORD_DEFAULT);
        $registro = $this->conect->prepare("INSERT INTO usuarios(full_name,email,password,role) VALUES (?,?,?,?)");

        if(!$registro){
            echo "Error en prepare:". $this->conect->error;
            return false;
        }

        $registro->bind_param("ssss",$full_name,$email,$passwordHash,$role);
        $resultado = $registro->execute();
        $registro->close();
        return $resultado;

    }

    //Obtención de los productos generales
    public function getProducts(){
        //Peticion de los datos en la base de datos
        $peticion = $this->conect->query('SELECT * FROM productos');
        $datos = [];
        $i = 0;

        //Ejecutamos el ciclo para almacenar los datos obtenidos desde la base de datos
        while($fila = $peticion->fetch_assoc()){
            $datos[$i] = $fila;
            $i++;
        }
        //Retornamos los registros obtenidos de la base de datos
        return $datos;
    }

    // Solicitud de productos generales
    public function Product($Nombre){
        //Consulta a la base de datos con la coincidencia del nombre
        //Si coincide el nombre me regresará todo el contenido
        $peticion = $this->conect->prepare("SELECT * FROM productos WHERE Nombre = ?");

        if(!$peticion){
            echo "Error en prepare: " . $this->conect->error;
            return [];
        }

        $peticion->bind_param("s",$Nombre);
        $peticion->execute();

        $resultado = $peticion->get_result();
        $datos=[];

        //Recorremos todos los datos y los guardamos en un arreglo seguro
        while($fila = $resultado->fetch_assoc()){
            $datos[] = $fila;
        }

        $peticion->close();
        return $datos;
    }

    public function EditProduct($id){
        //Se realiza la peticion a la base de datos
        //Comparacion del id_producos, si encuentra el id entonces regresará el registro obtenido
        $peticion = $this->conect->prepare("SELECT * FROM productos WHERE id_productos = ? ");
        if(!$peticion){
            echo "Error en prepare:" . $this->conect->error;
            return null;
        }

        $peticion->bind_param("i",$id);
        $peticion->execute();

        $resultado = $peticion->get_result();
        $producto = $resultado->fetch_assoc();
        $peticion->close();
        
        return $producto;
    }

    //Funcion de actualizacion de datos
    public function UpdateProduct($id,$Nombre,$Descripcion,$Precio){
        $peticion = $this->conect->prepare("UPDATE productos SET Nombre = ?, Descripcion=?,Precio=? WHERE id_productos=? ");

        if(!$peticion){
        echo "Error en prepare:" . $this->conect->error;
        return false;
        }

        //Vinculacion de parámetros
        $peticion->bind_param("ssii",$Nombre,$Descripcion,$Precio,$id);

        //Ejecutar
        $resultado = $peticion->execute();
        if(!$resultado){
            echo "Error en peticion: " . $peticion->error;
        }
        $peticion->close();
        return $resultado;
    }

    

    //Funcion insertar productos
    public function InsertProduct($Nombre,$Descripcion,$Precio){
        $peticion = $this->conect->prepare("INSERT INTO productos(Nombre,Descripcion,Precio)VALUES(?,?,?)");

        if(!$peticion){
            echo "Error en prepare:" . $this->conect->error;
            return false;
        }

        $peticion->bind_param("ssi",$Nombre,$Descripcion,$Precio);
        $resultado = $peticion->execute();

        if(!$resultado){
            echo "Error al insertar producto:" . $peticion->error;
        }else{
            echo "Producto insertado correctamente";
        }

        $peticion->close();
        return $resultado;
    }

    public function DeleteProduct($id){
        $peticion = $this->conect->prepare("DELETE FROM productos WHERE id_productos =?");

        if(!$peticion){
        echo "Error en prepare:" . $this->conect->error;
        return false;
    }

    $peticion->bind_param("i",$id);

    $resultado = $peticion->execute();
    if(!$resultado){
        echo "Error al eliminar producto:" . $peticion->error;
    }else{
        if($peticion->affectd_rows>0){
            echo "Producto eliminado correctamente";
        }else{
            echo "No se encontró el producto con ID: $id";
        }

    }

    $peticion->close();

    return $resultado;
    }
}

    