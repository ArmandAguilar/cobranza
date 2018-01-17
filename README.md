# Cobranza

> This project was make in PHP ,JQuery & MSSQL, the problem to solve here was that the administrative area need have control about the type of billing and can to see the next pays of clients.

### Tools used in this project

- PHP 5.3
- MSSQL
- Apache
- HTML5
- Jquery
- CSS

### Descriptions of scripts

**sis** : This script have the urls and key to connect MSSQL Server.

**index** : This script is the login with him make login in the system.

**logout** :  This script delete the session active for the user.

**panel** : This script have a dashboard where we can see a view of all billing and the action that us need make to generate a intention of billing or pay.

**add_factura** : This script can make billing of projects.

**facturacion_consulting** : With this scrips we can break relations between billing and  charges.

**operaciones_cosnulting** :  This script  we can do a search in the  MSSSQL and see if Thera are a relation between  a pay in the bank (in the table OperacionesConsulting).

**realcionar_lider** : This script can make a relationship between a leader and project.

**relacionar_maestro** : This script make  new maestros and can make relations between master project and projects.

![How is works](https://github.com/ArmandAguilar/cobranza/blob/master/Diagram/Diagram.png)
