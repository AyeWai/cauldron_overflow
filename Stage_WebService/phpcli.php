<?php
/*
* http://hexis-online.it/modules/divaltoInfinityConnec/DivaltoSoap_Hexis_Cli.php?dos=300&ets=MIL&depot=MI&tiers=C0000001&contact=FA
*
*/

/* Parmètre Divalto
 * 
	Dossier = hmpseek(ParamEntree,"dos","32")
	Etablis = hmpseek(ParamEntree,"ets","32")
	Depot   = hmpseek(ParamEntree,"depot","32")
	Tiers   = hmpseek(ParamEntree,"tiers","")
	Contact = hmpseek(ParamEntree,"contact","")
*/

$dossier=$_GET['dos'];
$ets=$_GET['ets'];
$depot=$_GET['depot'];
$tiers=$_GET['tiers'];
$contact=$_GET['contact'];

echo 'dossier '.$dossier.' - Ets '.$ets.' - depot '.$depot.'- Tiers '.$tiers.' - Contact '.$contact.'<br>';

//header('Content-type: text/xml');

echo '<br><h2>Test si ports ip sont ouverts</h2>';

//$MSSQL_HOST='37.97.101.91'; // Armen
$MSSQL_HOST='localhost'; // Hexis 
$MSSQL_USER='';
$MSSQL_MDP='';
$MSSQL_DATBASE='';
$MSSQL_PREFIX='';

//$ports = array(80, 81);
$ports = array(80,8080,8081,4443);
$port_ok=1;
foreach ($ports as $port)
{
    $connection = @fsockopen($MSSQL_HOST, $port, $errno, $errstr, 1);

    if (is_resource($connection))
    {
        echo '<h2>' . $MSSQL_HOST . ':' . $port . ' ' . '(' . getservbyport($port, 'tcp') . ') is open.</h2>' . "\n";

        fclose($connection);
        $port_ok=1;
    }
    else
    {
        echo '<h2>' . $MSSQL_HOST. ':' . $port . ' is not responding. Erreur:'.$errno.' '.$errstr.'</h2>' . "\n";
        $port_ok=0;
    }
}

// die;
//Exemple Amazon
//$client = new SoapClient('http://webservices.amazon.com/AWSECommerceService/AWSECommerceService.wsdl');
//var_dump($client->__getFunctions());

// Test si url web service est accéssible
// AS 400 $WSDL="http://vpn.hexis.fr:10010/web/services/WEBSRV_2?wsdl";
// $WSDL="http://37.97.101.91/WebServiceDiva/WebServiceDiva.asmx?wsdl"; // Armens
$WSDL="http://localhost:4443/WebServiceDiva/WebServiceDiva.asmx?wsdl"; // Hexis
echo 'Début Test soap Client <br>';

$client_ws = new SoapClient($WSDL, array('trace' => 1, 'exceptions' => 0));

if (is_soap_fault($client_ws)) {
    echo 'Soap close<br>';
    trigger_error("SOAP Fault: (faultcode: {$result->faultcode}, faultstring: {$result->faultstring})", E_USER_ERROR);
    die;
} else {
    echo 'Soap open - Liste des fonctions<br>';
    var_dump($client_ws->__getFunctions());
}

echo '<br>Fin Test de base connexion soap <br>';
//die;
//header('Content-type: text/xml');
echo '<br>Début Test connexion ws_client_it <br>';

$param_ws="<dos>".$dos."<ets>".$ets."<depot>".$depot."<tiers>".$tiers."<contact>".$contact;
$tableau_ws = array ("action"=>"<action>WS_CLI_HEXIS_IN01", "param"=>"".$param_ws."");
$cptws=0;
$code_retour=0;
$time_start = microtime(true);

while ($cptws<1) 
	{
	$cptws++;
	echo 'Test soap ws '.$tableau_ws['action'].'<br>';
	try
		{
		$result = $client_ws->WebServiceDiva($tableau_ws);
		}
		catch (SoapFault $e)
		{
		echo '<br>Erreur Soap Divalto<br>';
		print_r($e);
		return;
		}
		
	echo '<br>Ok Soap Divalto - Retour<br>';
	print_r($result);
	die;
	print "<br><br>Requete Web service client :</br>\n".$client_ws->__getLastRequest() ."\n";
	//die;
	$xml = $client_ws->__getLastResponse();
	if(empty($xml)) 
		{
		echo "<br><br>Pas de réponse web service<br>";
		return;
		}

	echo "<br>Réponse web service<br>";
		
	$tableau_q= explode(";", $divalto_listproduct);
	$tableau_r = explode(";", $xml);
	print_r($tableau_q);
	echo "<br><br>Code Retour: ".$tableau_r[0]."<br><br>";
	print_r($tableau_r);

	$retour_deb = "&lt;WebServiceDivaResult&gt;";
	$retour_fin = "&lt;/WebServiceDivaResult&gt;";
	$reponse_deb = "&lt;retour&gt;";
	$reponse_fin = "&lt;/retour&gt;";

	$pos_d = stripos($xml, $retour_deb) + 28;
	$pos_f = stripos($xml, $retour_fin) ;
	$code_retour= substr($xml, $pos_d , $pos_f-$pos_d);
	// echo "code retour corect si 0".$code_retour."<br>";
	if ($code_retour=='0') 
		{
		break;
		}
	// boucle attendre en 100 000 et 500 000 microsecondes => 0,1 secondes => 0,5 secondes 
	$pause=rand(100000,500000);
	usleep($pause);
	}


?>
