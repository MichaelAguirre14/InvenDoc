<?php

class Asignacion{

    public function mostrarAsignados(){
        $instanciaConexion = new Conexion();
        $datosAsignacion = $instanciaConexion->datos->prepare("SELECT  ASI.id_Guia,GUI.TotalRecaudo,EST.nombreEstado,GUI.Direccion
                                                                FROM Asignaciones AS ASI
                                                                    JOIN guias AS GUI ON ASI.id_Guia = GUI.NGuia
                                                                        JOIN estado_entrega AS EST ON ASI.Estado = EST.id
                                                                        WHERE DATE(ASI.Fecha) = CURDATE() ");

                                                                       // WHERE DATE(ASI.Fecha) = CURDATE()
        $datosAsignacion->execute();
        $AsignacionObjeto = $datosAsignacion->fetchAll(PDO::FETCH_OBJ);
        return $AsignacionObjeto;
    }

}

?>
