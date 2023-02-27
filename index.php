<?php 
function api($modulo,$get=NULL){
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, "https://app-integracao.arboimoveis.com/api/".$modulo.$get);
    curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); 
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false); 
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Authorization: key'));
    $response=curl_exec($ch);    
    return json_decode($response);   
    curl_close($ch);
}
echo '<br/><h1>cidades</h1><br/>';
foreach(api('cidades') as $dados){
    print_r($dados);
}
echo '<br/><h1>bairros</h1><br/>';
foreach(api('bairros') as $dados){
    print_r($dados);
}
$imoveis = api('imoveis','?page=1&perPage=10');
echo '<br/><h1>Imóveis</h1>: '.$imoveis->total.'<br/>';


foreach($imoveis->data as $dados){
    print_r($dados);
}