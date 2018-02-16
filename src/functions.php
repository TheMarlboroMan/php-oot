<?php
namespace OOT;

function database_connect() {
	\Consulta_mysql::conectar(\Constantes_bbdd_OOT::BBDD_HOST, \Constantes_bbdd_OOT::BBDD_USER, \Constantes_bbdd_OOT::BBDD_PASS, \Constantes_bbdd_OOT::BBDD_BASE_DATOS);
}
