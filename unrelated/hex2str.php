<?php

/* Source" http"//stackoverflow.com/questions/7488538/convert-hex-to-ascii-characters */
function hex2str($hex) {
    $str = '';
    for($i=0;$i<strlen($hex);$i+=2) $str .= chr(hexdec(substr($hex,$i,2)));
    return $str;
}


$drunk = array (

/* Remote control 5F */
"D19421075400B6142419FF1409142419FF1409FFFF2E20000601770000FFFFFFFF32303030CA",
"D19421075400B6142419FF1409142419FF1409FFFF2E20000601770000FFFFFFFF32303030CA",
"D19421073407070A0F22462036141201020100010001000100010001000100010009D122295C",
"D19421073407070A0F22462036141201020100010001000100010001000100010009D122295C",
"D1942107441791062F09E7000000000000000001631500107D09500D352252200114120BD4BA",
"D1942107441791062F09E7000000000000000001631500107D09500D352252200114120BD4BA",
"D194210774163F07540961081705170C1F06B3054A098E098301BD0B5722A608E50A9513677A",
"D19421078406C10912150F048B0A52111706A40B3B1A670568098C1CFF03B30A7716D1080F9E",
"D19421079408321A66066E09DF16BA077508A71E59081808BE0BC804C90AC41C720915090DD2",
"D1942107A4091D05240AAC2535058B0AD623E90922098B146605FF08FA148608DE09062EB7DA",
"D1942107B40626090B195906A409260E1F04B50A080D56047C092506CF058A08F125CC04FABB",
"D1942107C409ED12CF07380B5B1BF008530AAF22DA05D10A1421A50A5D09C427B306390A1EFB",
"D1942107D41FAC060908D80F4F08220AF21904069C08A228C0070C09CC1D3905110B921A11BC",
"D1942107E4029F0A463D63089508C5194005C609831AD2078E085430010ACB09E8136C06ABB5",
"D1942107F409CA211D07AE0984160F03AC091623B4064009C40D7C07CE0AED3ADA05430906EC",
"D194210804186706B809ED33570ADD088614BA05070A940BFA03AD096118E805FC07870EADFC",
"D194210814055E09D623D2066B09DB13F603C50ADC12DA05520A251637082A08E71029063EB0",
"D194210824085719B4077508FB23D903E4090C100F05490B33157B04500A240988068708C56D",
"D1942108341A2F06350A39055804610BBD212607430913276104C608F720BE04F00C12200E61",
"D19421084406F409C1061E04630A332B2C074B073427790636099E226A07620AC61073066560",
"D1942108540A460FC405880AAE2C2B04B90BA7186306610ABF247206D1099D229509E80869CE",
"D1942108641226077509C111A2027609B4130A06570B2E20B005970A74169105590AAA13864E",
"D194210874068A0A8F236308B40A090700059108ED0D9907290936152508D30913136D05F56F",
"D19421088408120A9802A8098D1D36086A094E0508040B0AA5201F05C5092F034402FE0A308D",
"D1942108940DBA04D40B7C16D707DF0A7D216D05F609E61613047F09B81ACB080108C10F11F8",
"D1942108A405140A60189806260AB71A9006630AAF1850066909B4221C04D50A90115A06CD88",
"D1942108B40AED12C3061B09E8131E03390C5A143506C80A0027BF0A2D09A51FAE07950A52E2",
"D1942108C41BD109380913264A083F091018F0077509DD123005A709AA1C2D082F0BD10F59B6",
"D1942108D405740AFE1B2807EF0B080FFB05AD09DD1494070B0C3418B108A009A53A010925EC",
"D1942108E409A3344B05C20B371605052A0AA41767055409DC1D4C044009FC0CFD088207C0BD",
"D1942108F4129904E20A3213D606E20A0C2DD006C1082C1AC807C309A71B6807AB0A84133AD3",
"D19421090406D90A2D0FCC051C096F29450571087A0DA004660A8C08AA06380A1D04270380AC",
"D19421091408AC0FD20779092A0DF3050F08F512B00380091B0FC103C308E9147503E70919AC",
"D1942109241A2D072B0B8927C40812090D0DBB07E6087E06F1051909C7084005AF08C708C6C5",
"D19421093405C60A991AF606C109DF18FA085B0A7519B6071C097E17B306DB0A0E1D89048E10",
"D1942109440B8419C608F90867110006490B7F2153064209F502AC02870A960D1C032209B876",
"D194210954040B037009541EB905D6086A141A05CB0BA2241507EC09770DBA04A40B350F41B0",
"D194210964056D0A440D7A046A074B13F9037709910E7506E9092504BD03F70A42226705E39A",
"D1942109740B001E8308F60A8429E5056309FA240105980B5B1F41062B09F915E60437098291",
"D19421098424C90827093715D908390891277F06A70B340CAD0521084C1ABD071A07C3211698",
"D19421099403C8091C08E706650A0E0F2A04F409CB1B0B033B0A6B0960063409EA130105B6B4",
"D1942109A409350BB306950B56102B057008682B06039E080C1A43028B0C5A0BF5077B0CAAB4",
"D1942109B4253F06770ACC0706054F08B515E706AA088F228009E108C7093D04EF0A460C42D5",
"D1942109C408370AA81C1C05D30A4216D6060009BA260A08690A3C1E8408700A80144802FFAA",
"D1942109D409800AFA056007C30FF9065F0AF2187306B9089C2C5905A40AFC0ECC057C097913",
"D1942109E429FF079D0A3D0F28057A0AA90D5004B40B560FAC056309710D4A043F0AD21567F6",
"D1942109F404B1097C0E9F05E50A4A126D059C0AAE21FE06620A1A1CAC07850BF10D74048711",
"D194210A040A3F26C309C80B871B4307F709D31FD706DF0A5318AA06940A14137C04C40C23E0",
"D194210A140E89046C0ABB0BEC07D70A760EBF043109031C0E03D40AA609F0048A0A3D2A0E11",
"D194210A2406E00A0022C80A59092312820B8808840D0007F20B5713D004940A691ACF037C84",
"D194210A340A990B9505CE09411B1B08110A1C075204F50B3F1BCE03CA0AA904F703B80A00DF",
"D194210A441AD5056A0A200B0302E709B0186E09290C090AD502DB076C10CD06790A191ECFDF",
"D194210A5407DF08DC17CE069F08B3128A078A08EB2425062809570AC402C90A2A20360AA4E4",
"D194210A64093F13BC05620B3B14EB06E10B161462057F0AF8138206C20A89101E09E10A41B0",
"D194210A740CF004430B0903F803620B4E210C05E4099414F70472090C0960051A096A1D0173",
"D194210A8404B90B3316B3059B0AAE28CB07B40A4E0F3B04F80B35194605D00AB4152B048CF1",
"D194210A940A0906A1051E08461EF5062509A01813076809080CBE07400A321267066E09896E",
"D194210AA416B407BE09B61CC1068D08A82CF20B1408710D0C03CB097A1009089608442217BE",
"D194210AB4075E094516B204EB0BE922F8043C09851F93041C092B081B055D07D803880340B0",
"D194210AC40A41036F02F7092B150A049B0ACE0357030E094A0F1304DA0AB3195005F108B0BB",
"D194210AD413C907030AE613EA03D0086C1F910435093A0E8405FA0984136C071E094F0626B8",
"D194210AE404BE090615CC05250A5420BC069F09C824D508D20AF614DD04070ABA1BDD0A030B",
"D194210AF40998291906760A86253808EE09D314ED070908101E390B2709C714B304310C6CA5",
"D194210B04258909E4093305D604DE091E14FD07010AB516260510093B0832060907E215976C",
"D194210B1404FC0A5A237B04FA093318B306F4085D0A81028107D10D8A046A0BA71791086DC9",
"D194210B2409D11675047D096B1D4304380A0B2EAD08880B1B1417038F09EB0DA404B40C26CC",
"D194210B3404C504160B64148F06A8073A05EE04760B5B11B104A309DA207F065109A62A3CB1",
"D194210B44088409FE18E906B807F31A4D06AC09BC0BDE063508B80CCF06CD09DB140C07B645",
"D194210B5409772EE607C90866145C08120A15176D06340ADF133003390BBC0BA306A90964AA",
"D194210B64197507780B26289608220C0815E108C809E212B407B1083C139A070609B51A9981",
"D194210B740775099D1DC909F10B3D1603053F0870198507140ADC1DC8057B099D21340983B4",
"D194210B840A5A1A1609A60B1C0D17044B0A7C180E05EF0BF608CE051D0A981F1A05FC0A521C",
"D194210B94329907E30A83285E089D097F2CB408130822186706C70A6D12E6040E089017469E",
"D194210BA406770949144203E309FD166E055C093E38A8060809F2048303EC09AE1CC007DCDB",
"D194210BB40A05184906E208751F9D05D809A2244B087609B51B8B069909E32152060A0A96AE",
"D194210BC42365084909EE1E3205200A83256208010ACB11BC07CC0B4D0E9706FC0A1F0000C7",

/* Remote control 54 */
"D19421032000B0142419FF1409142419FF1409FFFF1FB5000601710000FFFFFFFF32303030C8",
"D19421032000B0142419FF1409142419FF1409FFFF1FB5000601710000FFFFFFFF32303030C8",
"D19421030007070A0F204320431412010101000100010001000100010001000100AD8F7BF795",
"D19421030007070A0F204320431412010101000100010001000100010001000100AD8F7BF795",
"D19421031024C60DB30EB60000000000000000016311005ECFABBFFFB420492001141207343D",
"D19421031024C60DB30EB60000000000000000016311005ECFABBFFFB420492001141207343D",
"D1942103400684046005EC0931037E05DB0D0203A8098E02300215073109C101E1071F035536",
"D19421035002D807E11227050D0689058F03ED09FC0A0A022B07B70CCC06F507520D1A0568B9",
"D1942103600810085C02350716141005C9077A0D350364078C186F024F07CA041B035009AD54",
"D1942103700F91058A089E06AC03B306850273023C08080F170312085514E006A007270A2445",
"D194210380023606B203F203340A040600039507D1063504A306AD163D047D08C6069104822A",
"D194210390081B13CB075A06380D6103F008E70D8B03DA07E7045F0389093D099A01D1069DBE",
"D1942103A001FD01E5079F067F0472063A0DBF03FD074A0B66059B077F03FE035806F702B3E9",
"D1942103B0025B05CB02C7026608310C9D02E207F004E4033E0733027A024D09950C4903A981",
"D1942103C008480A3805F206B90F2606B70826022801E707B405A6048507CC05C704AF06F198",
"D1942103D0055903F809F306F903C807B3157B06810815035302C40682241103B305FA09F168",
"D1942103E0067608AE040102FA084F125F02AD0913116A01ED074C102902AA06AF089D03EECB",
"D1942103F006DF0ABB02A50913039002F0060101800177082D118A046C085B0988057C09FD86",
"D194210400036902D207A202B80283084B0A6C059706D6047D037406BF054303CE0A3F04A786",
"D19421041003C009370DFB04B2056102A6025F06420BDC038005D31668054C0789029602214F",
"D194210420075302CE02740771063E03E008080B6B030A08BC076504AB063B10AC0341069F72",
"D19421043014670655072F0F21047108B3116501ED06AE061D045107800D8407610770030020",
"D194210440028A087E0404036A07670CFB04F708EA04E503F206EE221402D206DA13BA0393B2",
"D19421045007500502031208BE01A8018F066205CB0445068D058003DF08A404A503BD07535A",
"D1942104600C2205B406FF021401EE08950E7602F1081302E3027C085205AA0412086D0D546F",
"D1942104700443078D02B1026107CD14F30418084E01CC01BB06FD0741049F072802C3027270",
"D19421048008F90AE1025507D103A102AC06E00FFD03B706AF0C9403E206B10DBE04810636CB",
"D194210490168A06EA08670A9C05A308B405E203D7071809FC0514086C03B502FA073509179C",
"D1942104A004D00899FFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFD7",
"D1942104B0FFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFF01000100010051",
"D1942104C01FC4011B0109242602700100105201000100274F010001120CB102CF0100123DD9",
"D1942104D0020E01001B36023501001052010001002EF80100013110B90153010B105201009D",
"D1942104E00100303C01CD010024E30139012A28C401F101041076011E01041FA501000100F2",
);

foreach ($drunk as $fuck)
{
	echo hex2str($fuck); // yeah
}
?>
