# Ottis_Prueba

## Descripción

Proyecto que sirve para evaluar las capacidades de un desarrollador. Es un gestor de proyectos con la siguiente funcionalidad

- Gestiona Roles de Usuarios
- Gestiona Proyectos de Usuarios
- Asigna Actividades a los Usuarios con respecto a un Proyecto

__Author:__ Christian Camilo Riaño Vega

__Información del sistema___
- SGBD Postgresql 12.1
- Symfony v4.4
- BDName: ottisdb
- Sistema operativo: Mac OSx - Catalina

Para ejecutar el servidor digite el siguiente comando: ./bin/console server:start


__Analisis de datos__

__Tabla usuario__

- Nombre: string(50) "Almacena el nombre personal del usuario"
- Apellido: string(50) "Almacena el apellido personal del usuario"
- Sexo: string(1) "Deetermina el sexo de la persona"
- Correo: string(50) unique "Permite el ingreso de usuario al sistema"
- Password: string(50) unique "Permite el ingreso del usuario al sistema"
- rol: integer "Determina el rol que tiene el usuario (1-Admin, 2-Usuario general, 3-Auditor"

__Tabla proyecto__

- Nombre: string(100) "Almacena el nombre del proyecto"
- Descripcion: string(200) "Almacena una descripción detallada del proyecto"
- Fecha_Inicio: date "Establece la fecha de inicio del proyecto"
- Fecha_Finalizacion: date "Establece la posible fecha de cierre del proyecto"



__Consideraciones__

- No se alcanzó a establecer el logueo del los usuarios, por ende la sesion se establece siendo admin
- No se alcanzó a desarrollar la entidad actividad para llevar el proceso de cada proyecto

