
Proyecto 1 - Infraestructura como código
Objetivos del proyectoPermalink

    Crear un escenario virtualizado con OpenTofu
    Configurarlo de forma automática con ansible

Entorno de trabajoPermalink

Para realizar este proyecto vamos a partir del escenario 3 del repositorio opentofu-libvirt. El escenario que creamos es el siguiente:

<img width="635" height="519" alt="imagen" src="https://github.com/user-attachments/assets/b3aaeddb-0bec-4944-8fd8-095cfc73af2f" />


    Un servidor web por el que accedemos por una red NAT desde el exterior. Que está conectado a una base de datos por una red aislada.
    Un servidor de base de datos que hemos conectado a la red NAT para que tenga internet y a la red aislada por donde se comunica con el servidor web.
    Las dos máquinas están conectadas a una red aislada sin DHCP que hemos llamado de configuración. Por esta red es por la que vamos a configurar el escenario por ansible. Al tener direcciones IP fijas podemos configurarlas en el inventario de ansible sin problemas.

Configuración del escenarioPermalink

A continuación tenemos un playbook ansible que configura el escenario:

    En el servidor web instala un servidor LAMP e implanta una aplicación PHP que tendrá datos en la base de datos.
    En la base de datos instala mariadb, crea la base de datos necesarias y la configura para el acceso remoto.

En este momento, y antes de continuar, estudia el escenario opentofu y el playbook ansible. Y cra el escenario y configúralo y comprueba que funciona de manera adecuada.
