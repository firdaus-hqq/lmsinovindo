<?php
error_reporting(0);
include ('../../koneksi/koneksi.php');
$ks			= $_POST['ks'];
$nama		= $_POST['nama'];
$optradio1	= $_POST['optradio1'];
$optradio2	= $_POST['optradio2'];
$optradio3	= $_POST['optradio3'];
$optradio4	= $_POST['optradio4'];
$optradio5	= $_POST['optradio5'];
$optradio6	= $_POST['optradio6'];
$optradio7	= $_POST['optradio7'];
$optradio8	= $_POST['optradio8'];
$optradio9	= $_POST['optradio9'];
$optradio10	= $_POST['optradio10'];
$optradio11	= $_POST['optradio11'];
$optradio12	= $_POST['optradio12'];
$optradio13	= $_POST['optradio13'];
$optradio14	= $_POST['optradio14'];
$optradio15	= $_POST['optradio15'];
$optradio16	= $_POST['optradio16'];
$optradio17	= $_POST['optradio17'];
$optradio18	= $_POST['optradio18'];
$optradio19	= $_POST['optradio19'];
$optradio20	= $_POST['optradio20'];
$optradio11	= $_POST['optradio21'];
$optradio22	= $_POST['optradio22'];
$optradio23	= $_POST['optradio23'];
$optradio24	= $_POST['optradio24'];
$optradio25	= $_POST['optradio25'];
$optradio26	= $_POST['optradio26'];
$optradio27	= $_POST['optradio27'];
$optradio28	= $_POST['optradio28'];
$optradio29	= $_POST['optradio29'];
$optradio30	= $_POST['optradio30'];
$optradio31	= $_POST['optradio31'];
$optradio32	= $_POST['optradio32'];
$optradio33	= $_POST['optradio33'];
$optradio34	= $_POST['optradio34'];
$optradio35	= $_POST['optradio35'];
$optradio36	= $_POST['optradio36'];
$optradio37	= $_POST['optradio37'];
$optradio38	= $_POST['optradio38'];
$optradio39	= $_POST['optradio39'];
$optradio40	= $_POST['optradio40'];
$optradio41	= $_POST['optradio41'];
$optradio42	= $_POST['optradio42'];
$optradio43	= $_POST['optradio43'];
$optradio44	= $_POST['optradio44'];
$optradio45	= $_POST['optradio45'];
$optradio46	= $_POST['optradio46'];
$optradio47	= $_POST['optradio47'];
$optradio48	= $_POST['optradio48'];
$optradio49	= $_POST['optradio49'];
$optradio50	= $_POST['optradio50'];
$optradio51	= $_POST['optradio51'];
$optradio52	= $_POST['optradio52'];
$optradio53	= $_POST['optradio53'];
$optradio54	= $_POST['optradio54'];
$optradio55	= $_POST['optradio55'];
$optradio56	= $_POST['optradio56'];
$optradio57	= $_POST['optradio57'];
$optradio58	= $_POST['optradio58'];
$optradio59	= $_POST['optradio59'];
$optradio60	= $_POST['optradio60'];
$optradio61	= $_POST['optradio61'];
$optradio62	= $_POST['optradio62'];
$optradio63	= $_POST['optradio63'];
$optradio64	= $_POST['optradio64'];
$optradio65	= $_POST['optradio65'];
$optradio66	= $_POST['optradio66'];
$optradio67	= $_POST['optradio67'];
$optradio68	= $_POST['optradio68'];
$optradio69	= $_POST['optradio69'];
$optradio70	= $_POST['optradio70'];
$optradio71	= $_POST['optradio71'];
$optradio72	= $_POST['optradio72'];
$optradio73	= $_POST['optradio73'];
$optradio74	= $_POST['optradio74'];
$optradio75	= $_POST['optradio75'];
$optradio76	= $_POST['optradio76'];
$optradio77	= $_POST['optradio77'];
$optradio78	= $_POST['optradio78'];
$optradio79	= $_POST['optradio79'];
$optradio80	= $_POST['optradio80'];
$optradio81	= $_POST['optradio81'];
$optradio82	= $_POST['optradio82'];
$optradio83	= $_POST['optradio83'];
$optradio84	= $_POST['optradio84'];
$optradio85	= $_POST['optradio85'];
$optradio86	= $_POST['optradio86'];
$optradio87	= $_POST['optradio87'];
$optradio88	= $_POST['optradio88'];
$optradio89	= $_POST['optradio89'];
$optradio90	= $_POST['optradio90'];
$optradio91	= $_POST['optradio91'];
$optradio92	= $_POST['optradio92'];
$optradio93	= $_POST['optradio93'];
$optradio94	= $_POST['optradio94'];
$optradio95	= $_POST['optradio95'];
$optradio96	= $_POST['optradio96'];
$optradio97	= $_POST['optradio97'];
$optradio98	= $_POST['optradio98'];
$optradio99	= $_POST['optradio99'];
$optradio100	= $_POST['optradio100'];

$query3 = mysqli_query ($konek, "SELECT * FROM soal WHERE kodesoal='$ks' AND status='2'");
$rows = mysqli_num_rows($query3);
$query2 = mysqli_query ($konek, "SELECT * FROM ujian WHERE kodesoal='$ks'");
$ur = mysqli_fetch_array ($query2);
$nilaimaxurai=100-$ur['nilai'];
$nilaipersoal=$nilaimaxurai/$rows ;
$nilaiperbiji=$nilaipersoal/5;
$nilaipoint=$optradio1+$optradio2+$optradio3+$optradio4+$optradio5+$optradio6+$optradio7+$optradio8+$optradio9+$optradio10+$optradio11+$optradio12+$optradio13+$optradio14+$optradio15+$optradio16+$optradio17+$optradio18+$optradio19+$optradio20+$optradio21+$optradio22+$optradio23+$optradio24+$optradio25+$optradio26+$optradio27+$optradio28+$optradio29+$optradio30+$optradio31+$optradio32+$optradio33+$optradio34+$optradio35+$optradio36+$optradio37+$optradio38+$optradio39+$optradio40+$optradio41+$optradio42+$optradio43+$optradio44+$optradio45+$optradio46+$optradio47+$optradio48+$optradio49+$optradio50+$optradio51+$optradio52+$optradio53+$optradio54+$optradio55+$optradio56+$optradio57+$optradio58+$optradio59+$optradio60+$optradio61+$optradio62+$optradio63+$optradio64+$optradio65+$optradio66+$optradio67+$optradio68+$optradio69+$optradio70+$optradio71+$optradio72+$optradio73+$optradio74+$optradio75+$optradio76+$optradio77+$optradio78+$optradio79+$optradio80+$optradio81+$optradio82+$optradio83+$optradio84+$optradio85+$optradio86+$optradio87+$optradio88+$optradio89+$optradio90+$optradio91+$optradio92+$optradio93+$optradio94+$optradio95+$optradio96+$optradio97+$optradio98+$optradio99+$optradio100;
$nilaifix=$nilaipoint*$nilaiperbiji;
mysqli_query($konek, "UPDATE jawaburaian SET nilai='$optradio1' WHERE nama='$nama' AND kodesoal='$ks' AND nomersoal='1'");
mysqli_query($konek, "UPDATE jawaburaian SET nilai='$optradio2' WHERE nama='$nama' AND kodesoal='$ks' AND nomersoal='2'");
mysqli_query($konek, "UPDATE jawaburaian SET nilai='$optradio3' WHERE nama='$nama' AND kodesoal='$ks' AND nomersoal='3'");
mysqli_query($konek, "UPDATE jawaburaian SET nilai='$optradio4' WHERE nama='$nama' AND kodesoal='$ks' AND nomersoal='4'");
mysqli_query($konek, "UPDATE jawaburaian SET nilai='$optradio5' WHERE nama='$nama' AND kodesoal='$ks' AND nomersoal='5'");
mysqli_query($konek, "UPDATE jawaburaian SET nilai='$optradio6' WHERE nama='$nama' AND kodesoal='$ks' AND nomersoal='6'");
mysqli_query($konek, "UPDATE jawaburaian SET nilai='$optradio7' WHERE nama='$nama' AND kodesoal='$ks' AND nomersoal='7'");
mysqli_query($konek, "UPDATE jawaburaian SET nilai='$optradio8' WHERE nama='$nama' AND kodesoal='$ks' AND nomersoal='8'");
mysqli_query($konek, "UPDATE jawaburaian SET nilai='$optradio9' WHERE nama='$nama' AND kodesoal='$ks' AND nomersoal='9'");
mysqli_query($konek, "UPDATE jawaburaian SET nilai='$optradio10' WHERE nama='$nama' AND kodesoal='$ks' AND nomersoal='10'");
mysqli_query($konek, "UPDATE jawaburaian SET nilai='$optradio11' WHERE nama='$nama' AND kodesoal='$ks' AND nomersoal='11'");
mysqli_query($konek, "UPDATE jawaburaian SET nilai='$optradio12' WHERE nama='$nama' AND kodesoal='$ks' AND nomersoal='12'");
mysqli_query($konek, "UPDATE jawaburaian SET nilai='$optradio13' WHERE nama='$nama' AND kodesoal='$ks' AND nomersoal='13'");
mysqli_query($konek, "UPDATE jawaburaian SET nilai='$optradio14' WHERE nama='$nama' AND kodesoal='$ks' AND nomersoal='14'");
mysqli_query($konek, "UPDATE jawaburaian SET nilai='$optradio15' WHERE nama='$nama' AND kodesoal='$ks' AND nomersoal='15'");
mysqli_query($konek, "UPDATE jawaburaian SET nilai='$optradio16' WHERE nama='$nama' AND kodesoal='$ks' AND nomersoal='16'");
mysqli_query($konek, "UPDATE jawaburaian SET nilai='$optradio17' WHERE nama='$nama' AND kodesoal='$ks' AND nomersoal='17'");
mysqli_query($konek, "UPDATE jawaburaian SET nilai='$optradio18' WHERE nama='$nama' AND kodesoal='$ks' AND nomersoal='18'");
mysqli_query($konek, "UPDATE jawaburaian SET nilai='$optradio19' WHERE nama='$nama' AND kodesoal='$ks' AND nomersoal='19'");
mysqli_query($konek, "UPDATE jawaburaian SET nilai='$optradio20' WHERE nama='$nama' AND kodesoal='$ks' AND nomersoal='20'");
mysqli_query($konek, "UPDATE jawaburaian SET nilai='$optradio21' WHERE nama='$nama' AND kodesoal='$ks' AND nomersoal='21'");
mysqli_query($konek, "UPDATE jawaburaian SET nilai='$optradio22' WHERE nama='$nama' AND kodesoal='$ks' AND nomersoal='22'");
mysqli_query($konek, "UPDATE jawaburaian SET nilai='$optradio23' WHERE nama='$nama' AND kodesoal='$ks' AND nomersoal='23'");
mysqli_query($konek, "UPDATE jawaburaian SET nilai='$optradio24' WHERE nama='$nama' AND kodesoal='$ks' AND nomersoal='24'");
mysqli_query($konek, "UPDATE jawaburaian SET nilai='$optradio25' WHERE nama='$nama' AND kodesoal='$ks' AND nomersoal='25'");
mysqli_query($konek, "UPDATE jawaburaian SET nilai='$optradio26' WHERE nama='$nama' AND kodesoal='$ks' AND nomersoal='26'");
mysqli_query($konek, "UPDATE jawaburaian SET nilai='$optradio27' WHERE nama='$nama' AND kodesoal='$ks' AND nomersoal='27'");
mysqli_query($konek, "UPDATE jawaburaian SET nilai='$optradio28' WHERE nama='$nama' AND kodesoal='$ks' AND nomersoal='28'");
mysqli_query($konek, "UPDATE jawaburaian SET nilai='$optradio29' WHERE nama='$nama' AND kodesoal='$ks' AND nomersoal='29'");
mysqli_query($konek, "UPDATE jawaburaian SET nilai='$optradio30' WHERE nama='$nama' AND kodesoal='$ks' AND nomersoal='30'");
mysqli_query($konek, "UPDATE jawaburaian SET nilai='$optradio31' WHERE nama='$nama' AND kodesoal='$ks' AND nomersoal='31'");
mysqli_query($konek, "UPDATE jawaburaian SET nilai='$optradio32' WHERE nama='$nama' AND kodesoal='$ks' AND nomersoal='32'");
mysqli_query($konek, "UPDATE jawaburaian SET nilai='$optradio33' WHERE nama='$nama' AND kodesoal='$ks' AND nomersoal='33'");
mysqli_query($konek, "UPDATE jawaburaian SET nilai='$optradio34' WHERE nama='$nama' AND kodesoal='$ks' AND nomersoal='34'");
mysqli_query($konek, "UPDATE jawaburaian SET nilai='$optradio35' WHERE nama='$nama' AND kodesoal='$ks' AND nomersoal='35'");
mysqli_query($konek, "UPDATE jawaburaian SET nilai='$optradio36' WHERE nama='$nama' AND kodesoal='$ks' AND nomersoal='36'");
mysqli_query($konek, "UPDATE jawaburaian SET nilai='$optradio37' WHERE nama='$nama' AND kodesoal='$ks' AND nomersoal='37'");
mysqli_query($konek, "UPDATE jawaburaian SET nilai='$optradio38' WHERE nama='$nama' AND kodesoal='$ks' AND nomersoal='38'");
mysqli_query($konek, "UPDATE jawaburaian SET nilai='$optradio39' WHERE nama='$nama' AND kodesoal='$ks' AND nomersoal='39'");
mysqli_query($konek, "UPDATE jawaburaian SET nilai='$optradio40' WHERE nama='$nama' AND kodesoal='$ks' AND nomersoal='40'");
mysqli_query($konek, "UPDATE jawaburaian SET nilai='$optradio41' WHERE nama='$nama' AND kodesoal='$ks' AND nomersoal='41'");
mysqli_query($konek, "UPDATE jawaburaian SET nilai='$optradio42' WHERE nama='$nama' AND kodesoal='$ks' AND nomersoal='42'");
mysqli_query($konek, "UPDATE jawaburaian SET nilai='$optradio43' WHERE nama='$nama' AND kodesoal='$ks' AND nomersoal='43'");
mysqli_query($konek, "UPDATE jawaburaian SET nilai='$optradio44' WHERE nama='$nama' AND kodesoal='$ks' AND nomersoal='44'");
mysqli_query($konek, "UPDATE jawaburaian SET nilai='$optradio45' WHERE nama='$nama' AND kodesoal='$ks' AND nomersoal='45'");
mysqli_query($konek, "UPDATE jawaburaian SET nilai='$optradio46' WHERE nama='$nama' AND kodesoal='$ks' AND nomersoal='46'");
mysqli_query($konek, "UPDATE jawaburaian SET nilai='$optradio47' WHERE nama='$nama' AND kodesoal='$ks' AND nomersoal='47'");
mysqli_query($konek, "UPDATE jawaburaian SET nilai='$optradio48' WHERE nama='$nama' AND kodesoal='$ks' AND nomersoal='48'");
mysqli_query($konek, "UPDATE jawaburaian SET nilai='$optradio49' WHERE nama='$nama' AND kodesoal='$ks' AND nomersoal='49'");
mysqli_query($konek, "UPDATE jawaburaian SET nilai='$optradio50' WHERE nama='$nama' AND kodesoal='$ks' AND nomersoal='50'");
mysqli_query($konek, "UPDATE jawaburaian SET nilai='$optradio51' WHERE nama='$nama' AND kodesoal='$ks' AND nomersoal='51'");
mysqli_query($konek, "UPDATE jawaburaian SET nilai='$optradio52' WHERE nama='$nama' AND kodesoal='$ks' AND nomersoal='52'");
mysqli_query($konek, "UPDATE jawaburaian SET nilai='$optradio53' WHERE nama='$nama' AND kodesoal='$ks' AND nomersoal='53'");
mysqli_query($konek, "UPDATE jawaburaian SET nilai='$optradio54' WHERE nama='$nama' AND kodesoal='$ks' AND nomersoal='54'");
mysqli_query($konek, "UPDATE jawaburaian SET nilai='$optradio55' WHERE nama='$nama' AND kodesoal='$ks' AND nomersoal='55'");
mysqli_query($konek, "UPDATE jawaburaian SET nilai='$optradio56' WHERE nama='$nama' AND kodesoal='$ks' AND nomersoal='56'");
mysqli_query($konek, "UPDATE jawaburaian SET nilai='$optradio57' WHERE nama='$nama' AND kodesoal='$ks' AND nomersoal='57'");
mysqli_query($konek, "UPDATE jawaburaian SET nilai='$optradio58' WHERE nama='$nama' AND kodesoal='$ks' AND nomersoal='58'");
mysqli_query($konek, "UPDATE jawaburaian SET nilai='$optradio59' WHERE nama='$nama' AND kodesoal='$ks' AND nomersoal='59'");
mysqli_query($konek, "UPDATE jawaburaian SET nilai='$optradio60' WHERE nama='$nama' AND kodesoal='$ks' AND nomersoal='60'");
mysqli_query($konek, "UPDATE jawaburaian SET nilai='$optradio61' WHERE nama='$nama' AND kodesoal='$ks' AND nomersoal='61'");
mysqli_query($konek, "UPDATE jawaburaian SET nilai='$optradio62' WHERE nama='$nama' AND kodesoal='$ks' AND nomersoal='62'");
mysqli_query($konek, "UPDATE jawaburaian SET nilai='$optradio63' WHERE nama='$nama' AND kodesoal='$ks' AND nomersoal='63'");
mysqli_query($konek, "UPDATE jawaburaian SET nilai='$optradio64' WHERE nama='$nama' AND kodesoal='$ks' AND nomersoal='64'");
mysqli_query($konek, "UPDATE jawaburaian SET nilai='$optradio65' WHERE nama='$nama' AND kodesoal='$ks' AND nomersoal='65'");
mysqli_query($konek, "UPDATE jawaburaian SET nilai='$optradio66' WHERE nama='$nama' AND kodesoal='$ks' AND nomersoal='66'");
mysqli_query($konek, "UPDATE jawaburaian SET nilai='$optradio67' WHERE nama='$nama' AND kodesoal='$ks' AND nomersoal='67'");
mysqli_query($konek, "UPDATE jawaburaian SET nilai='$optradio68' WHERE nama='$nama' AND kodesoal='$ks' AND nomersoal='68'");
mysqli_query($konek, "UPDATE jawaburaian SET nilai='$optradio69' WHERE nama='$nama' AND kodesoal='$ks' AND nomersoal='69'");
mysqli_query($konek, "UPDATE jawaburaian SET nilai='$optradio70' WHERE nama='$nama' AND kodesoal='$ks' AND nomersoal='70'");
mysqli_query($konek, "UPDATE jawaburaian SET nilai='$optradio71' WHERE nama='$nama' AND kodesoal='$ks' AND nomersoal='71'");
mysqli_query($konek, "UPDATE jawaburaian SET nilai='$optradio72' WHERE nama='$nama' AND kodesoal='$ks' AND nomersoal='72'");
mysqli_query($konek, "UPDATE jawaburaian SET nilai='$optradio73' WHERE nama='$nama' AND kodesoal='$ks' AND nomersoal='73'");
mysqli_query($konek, "UPDATE jawaburaian SET nilai='$optradio74' WHERE nama='$nama' AND kodesoal='$ks' AND nomersoal='74'");
mysqli_query($konek, "UPDATE jawaburaian SET nilai='$optradio75' WHERE nama='$nama' AND kodesoal='$ks' AND nomersoal='75'");
mysqli_query($konek, "UPDATE jawaburaian SET nilai='$optradio76' WHERE nama='$nama' AND kodesoal='$ks' AND nomersoal='76'");
mysqli_query($konek, "UPDATE jawaburaian SET nilai='$optradio77' WHERE nama='$nama' AND kodesoal='$ks' AND nomersoal='77'");
mysqli_query($konek, "UPDATE jawaburaian SET nilai='$optradio78' WHERE nama='$nama' AND kodesoal='$ks' AND nomersoal='78'");
mysqli_query($konek, "UPDATE jawaburaian SET nilai='$optradio79' WHERE nama='$nama' AND kodesoal='$ks' AND nomersoal='79'");
mysqli_query($konek, "UPDATE jawaburaian SET nilai='$optradio80' WHERE nama='$nama' AND kodesoal='$ks' AND nomersoal='80'");
mysqli_query($konek, "UPDATE jawaburaian SET nilai='$optradio81' WHERE nama='$nama' AND kodesoal='$ks' AND nomersoal='81'");
mysqli_query($konek, "UPDATE jawaburaian SET nilai='$optradio82' WHERE nama='$nama' AND kodesoal='$ks' AND nomersoal='82'");
mysqli_query($konek, "UPDATE jawaburaian SET nilai='$optradio83' WHERE nama='$nama' AND kodesoal='$ks' AND nomersoal='83'");
mysqli_query($konek, "UPDATE jawaburaian SET nilai='$optradio84' WHERE nama='$nama' AND kodesoal='$ks' AND nomersoal='84'");
mysqli_query($konek, "UPDATE jawaburaian SET nilai='$optradio85' WHERE nama='$nama' AND kodesoal='$ks' AND nomersoal='85'");
mysqli_query($konek, "UPDATE jawaburaian SET nilai='$optradio86' WHERE nama='$nama' AND kodesoal='$ks' AND nomersoal='86'");
mysqli_query($konek, "UPDATE jawaburaian SET nilai='$optradio87' WHERE nama='$nama' AND kodesoal='$ks' AND nomersoal='87'");
mysqli_query($konek, "UPDATE jawaburaian SET nilai='$optradio88' WHERE nama='$nama' AND kodesoal='$ks' AND nomersoal='88'");
mysqli_query($konek, "UPDATE jawaburaian SET nilai='$optradio89' WHERE nama='$nama' AND kodesoal='$ks' AND nomersoal='89'");
mysqli_query($konek, "UPDATE jawaburaian SET nilai='$optradio90' WHERE nama='$nama' AND kodesoal='$ks' AND nomersoal='90'");
mysqli_query($konek, "UPDATE jawaburaian SET nilai='$optradio91' WHERE nama='$nama' AND kodesoal='$ks' AND nomersoal='91'");
mysqli_query($konek, "UPDATE jawaburaian SET nilai='$optradio92' WHERE nama='$nama' AND kodesoal='$ks' AND nomersoal='92'");
mysqli_query($konek, "UPDATE jawaburaian SET nilai='$optradio93' WHERE nama='$nama' AND kodesoal='$ks' AND nomersoal='93'");
mysqli_query($konek, "UPDATE jawaburaian SET nilai='$optradio94' WHERE nama='$nama' AND kodesoal='$ks' AND nomersoal='94'");
mysqli_query($konek, "UPDATE jawaburaian SET nilai='$optradio95' WHERE nama='$nama' AND kodesoal='$ks' AND nomersoal='95'");
mysqli_query($konek, "UPDATE jawaburaian SET nilai='$optradio96' WHERE nama='$nama' AND kodesoal='$ks' AND nomersoal='96'");
mysqli_query($konek, "UPDATE jawaburaian SET nilai='$optradio97' WHERE nama='$nama' AND kodesoal='$ks' AND nomersoal='97'");
mysqli_query($konek, "UPDATE jawaburaian SET nilai='$optradio98' WHERE nama='$nama' AND kodesoal='$ks' AND nomersoal='98'");
mysqli_query($konek, "UPDATE jawaburaian SET nilai='$optradio99' WHERE nama='$nama' AND kodesoal='$ks' AND nomersoal='99'");
mysqli_query($konek, "UPDATE jawaburaian SET nilai='$optradio100' WHERE nama='$nama' AND kodesoal='$ks' AND nomersoal='100'");
mysqli_query($konek, "UPDATE nilaihasil SET nilaiurai='$nilaifix', statuskoreksi='2' WHERE nama='$nama' AND kodesoal='$ks'");
echo "
<form method='post' action='../hasiltest.php' name='balik'>
<input type='hidden' name='cari' value='$ks'>
<input type='hidden' name='show' value='1'>
<input type='hidden' value='submit' name='mem_type' border='0'>
</form>
<script>
window.onload = function(){
  document.forms['balik'].submit();
}
</script>
"
?>