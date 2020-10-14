<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ProvinciaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('provincia')->insert([
            ['nomProv' => 'CHACHAPOYAS', 'fk_departamento' => 1],
            ['nomProv' =>'BAGUA', 'fk_departamento' => 1],
            ['nomProv' =>'BONGARA', 'fk_departamento' => 1],
            ['nomProv' =>'CONDORCANQUI', 'fk_departamento' => 1],
            ['nomProv' =>'LUYA', 'fk_departamento' => 1],
            ['nomProv' =>'RODRIGUEZ DE MENDOZA', 'fk_departamento' => 1],
            ['nomProv' =>'UTCUBAMBA', 'fk_departamento' => 1],
            ['nomProv' =>'HUARAZ', 'fk_departamento' => 2],
            ['nomProv' =>'AIJA', 'fk_departamento' => 2],
            ['nomProv' =>'ANTONIO RAYMONDI', 'fk_departamento' => 2],
            ['nomProv' =>'ASUNCION', 'fk_departamento' => 2],
            ['nomProv' =>'BOLOGNESI', 'fk_departamento' => 2],
            ['nomProv' =>'CARHUAZ', 'fk_departamento' => 2],
            ['nomProv' =>'CARLOS FERMIN FITZCARRALD', 'fk_departamento' => 2],
            ['nomProv' =>'CASMA', 'fk_departamento' => 2],
            ['nomProv' =>'CORONGO', 'fk_departamento' => 2],
            ['nomProv' =>'HUARI', 'fk_departamento' => 2],
            ['nomProv' =>'HUARMEY', 'fk_departamento' => 2],
            ['nomProv' =>'HUAYLAS', 'fk_departamento' => 2],
            ['nomProv' =>'MARISCAL LUZURIAGA', 'fk_departamento' => 2],
            ['nomProv' =>'OCROS', 'fk_departamento' => 2],
            ['nomProv' =>'PALLASCA', 'fk_departamento' => 2],
            ['nomProv' =>'POMABAMBA', 'fk_departamento' => 2],
            ['nomProv' =>'RECUAY', 'fk_departamento' => 2],
            ['nomProv' =>'SANTA', 'fk_departamento' => 2],
            ['nomProv' =>'SIHUAS', 'fk_departamento' => 2],
            ['nomProv' =>'YUNGAY', 'fk_departamento' => 2],
            ['nomProv' =>'ABANCAY', 'fk_departamento' => 3],
            ['nomProv' =>'ANDAHUAYLAS', 'fk_departamento' => 3],
            ['nomProv' =>'ANTABAMBA', 'fk_departamento' => 3],
            ['nomProv' =>'AYMARAES', 'fk_departamento' => 3],
            ['nomProv' =>'COTABAMBAS', 'fk_departamento' => 3],
            ['nomProv' =>'CHINCHEROS', 'fk_departamento' => 3],
            ['nomProv' =>'GRAU', 'fk_departamento' => 3],
            ['nomProv' =>'AREQUIPA', 'fk_departamento' => 4],
            ['nomProv' =>'CAMANA', 'fk_departamento' => 4],
            ['nomProv' =>'CARAVELI', 'fk_departamento' => 4],
            ['nomProv' =>'CASTILLA', 'fk_departamento' => 4],
            ['nomProv' =>'CAYLLOMA', 'fk_departamento' => 4],
            ['nomProv' =>'CONDESUYOS', 'fk_departamento' => 4],
            ['nomProv' =>'ISLAY', 'fk_departamento' => 4],
            ['nomProv' =>'LA UNION', 'fk_departamento' => 4],
            ['nomProv' =>'HUAMANGA', 'fk_departamento' => 5],
            ['nomProv' =>'CANGALLO', 'fk_departamento' => 5],
            ['nomProv' =>'HUANCA SANCOS', 'fk_departamento' => 5],
            ['nomProv' =>'HUANTA', 'fk_departamento' => 5],
            ['nomProv' =>'LA MAR', 'fk_departamento' => 5],
            ['nomProv' =>'LUCANAS', 'fk_departamento' => 5],
            ['nomProv' =>'PARINACOCHAS', 'fk_departamento' => 5],
            ['nomProv' =>'PAUCAR DEL SARA SARA', 'fk_departamento' => 5],
            ['nomProv' =>'SUCRE', 'fk_departamento' => 5],
            ['nomProv' =>'VICTOR FAJARDO', 'fk_departamento' => 5],
            ['nomProv' =>'VILCAS HUAMAN', 'fk_departamento' => 5],
            ['nomProv' =>'CAJAMARCA', 'fk_departamento' => 6],
            ['nomProv' =>'CAJABAMBA', 'fk_departamento' => 6],
            ['nomProv' =>'CELENDIN', 'fk_departamento' => 6],
            ['nomProv' =>'CHOTA', 'fk_departamento' => 6],
            ['nomProv' =>'CONTUMAZA', 'fk_departamento' => 6],
            ['nomProv' =>'CUTERVO', 'fk_departamento' => 6],
            ['nomProv' =>'HUALGAYOC', 'fk_departamento' => 6],
            ['nomProv' =>'JAEN', 'fk_departamento' => 6],
            ['nomProv' =>'SAN IGNACIO', 'fk_departamento' => 6],
            ['nomProv' =>'SAN MARCOS', 'fk_departamento' => 6],
            ['nomProv' =>'SAN PABLO', 'fk_departamento' => 6],
            ['nomProv' =>'SANTA CRUZ', 'fk_departamento' => 6],
            ['nomProv' =>'CALLAO', 'fk_departamento' => 7],
            ['nomProv' =>'CUSCO', 'fk_departamento' => 8],
            ['nomProv' =>'ACOMAYO', 'fk_departamento' => 8],
            ['nomProv' =>'ANTA', 'fk_departamento' => 8],
            ['nomProv' =>'CALCA', 'fk_departamento' => 8],
            ['nomProv' =>'CANAS', 'fk_departamento' => 8],
            ['nomProv' =>'CANCHIS', 'fk_departamento' => 8],
            ['nomProv' =>'CHUMBIVILCAS', 'fk_departamento' => 8],
            ['nomProv' =>'ESPINAR', 'fk_departamento' => 8],
            ['nomProv' =>'LA CONVENCION', 'fk_departamento' => 8],
            ['nomProv' =>'PARURO', 'fk_departamento' => 8],
            ['nomProv' =>'PAUCARTAMBO', 'fk_departamento' => 8],
            ['nomProv' =>'QUISPICANCHI', 'fk_departamento' => 8],
            ['nomProv' =>'URUBAMBA', 'fk_departamento' => 8],
            ['nomProv' =>'HUANCAVELICA', 'fk_departamento' => 9],
            ['nomProv' =>'ACOBAMBA', 'fk_departamento' => 9],
            ['nomProv' =>'ANGARAES', 'fk_departamento' => 9],
            ['nomProv' =>'CASTROVIRREYNA', 'fk_departamento' => 9],
            ['nomProv' =>'CHURCAMPA', 'fk_departamento' => 9],
            ['nomProv' =>'HUAYTARA', 'fk_departamento' => 9],
            ['nomProv' =>'TAYACAJA', 'fk_departamento' => 9],
            ['nomProv' =>'HUANUCO', 'fk_departamento' => 10],
            ['nomProv' =>'AMBO', 'fk_departamento' => 10],
            ['nomProv' =>'DOS DE MAYO', 'fk_departamento' => 10],
            ['nomProv' =>'HUACAYBAMBA', 'fk_departamento' => 10],
            ['nomProv' =>'HUAMALIES', 'fk_departamento' => 10],
            ['nomProv' =>'LEONCIO PRADO', 'fk_departamento' => 10],
            ['nomProv' =>'MARA&Ntilde;ON', 'fk_departamento' => 10],
            ['nomProv' =>'PACHITEA', 'fk_departamento' => 10],
            ['nomProv' =>'PUERTO INCA', 'fk_departamento' => 10],
            ['nomProv' =>'LAURICOCHA', 'fk_departamento' => 10],
            ['nomProv' =>'YAROWILCA', 'fk_departamento' => 10],
            ['nomProv' =>'ICA', 'fk_departamento' => 11],
            ['nomProv' =>'CHINCHA', 'fk_departamento' => 11],
            ['nomProv' =>'NAZCA', 'fk_departamento' => 11],
            ['nomProv' =>'PALPA', 'fk_departamento' => 11],
            ['nomProv' =>'PISCO', 'fk_departamento' => 11],
            ['nomProv' =>'HUANCAYO', 'fk_departamento' => 12],
            ['nomProv' =>'CONCEPCION', 'fk_departamento' => 12],
            ['nomProv' =>'CHANCHAMAYO', 'fk_departamento' => 12],
            ['nomProv' =>'JAUJA', 'fk_departamento' => 12],
            ['nomProv' =>'JUNIN', 'fk_departamento' => 12],
            ['nomProv' =>'SATIPO', 'fk_departamento' => 12],
            ['nomProv' =>'TARMA', 'fk_departamento' => 12],
            ['nomProv' =>'YAULI', 'fk_departamento' => 12],
            ['nomProv' =>'CHUPACA', 'fk_departamento' => 12],
            ['nomProv' =>'TRUJILLO', 'fk_departamento' => 13],
            ['nomProv' =>'ASCOPE', 'fk_departamento' => 13],
            ['nomProv' =>'BOLIVAR', 'fk_departamento' => 13],
            ['nomProv' =>'CHEPEN', 'fk_departamento' => 13],
            ['nomProv' =>'JULCAN', 'fk_departamento' => 13],
            ['nomProv' =>'OTUZCO', 'fk_departamento' => 13],
            ['nomProv' =>'PACASMAYO', 'fk_departamento' => 13],
            ['nomProv' =>'PATAZ', 'fk_departamento' => 13],
            ['nomProv' =>'SANCHEZ CARRION', 'fk_departamento' => 13],
            ['nomProv' =>'SANTIAGO DE CHUCO', 'fk_departamento' => 13],
            ['nomProv' =>'GRAN CHIMU', 'fk_departamento' => 13],
            ['nomProv' =>'VIRU', 'fk_departamento' => 13],
            ['nomProv' =>'CHICLAYO', 'fk_departamento' => 14],
            ['nomProv' =>'FERRE&Ntilde;AFE', 'fk_departamento' => 14],
            ['nomProv' =>'LAMBAYEQUE', 'fk_departamento' => 14],
            ['nomProv' =>'LIMA', 'fk_departamento' => 15],
            ['nomProv' =>'BARRANCA', 'fk_departamento' => 15],
            ['nomProv' =>'CAJATAMBO', 'fk_departamento' => 15],
            ['nomProv' =>'CANTA', 'fk_departamento' => 15],
            ['nomProv' =>'CA&Ntilde;ETE', 'fk_departamento' => 15],
            ['nomProv' =>'HUARAL', 'fk_departamento' => 15],
            ['nomProv' =>'HUAROCHIRI', 'fk_departamento' => 15],
            ['nomProv' =>'HUAURA', 'fk_departamento' => 15],
            ['nomProv' =>'OYON', 'fk_departamento' => 15],
            ['nomProv' =>'YAUYOS', 'fk_departamento' => 15],
            ['nomProv' =>'MAYNAS', 'fk_departamento' => 16],
            ['nomProv' =>'ALTO AMAZONAS', 'fk_departamento' => 16],
            ['nomProv' =>'LORETO', 'fk_departamento' => 16],
            ['nomProv' =>'MARISCAL RAMON CASTILLA', 'fk_departamento' => 16],
            ['nomProv' =>'REQUENA', 'fk_departamento' => 16],
            ['nomProv' =>'UCAYALI', 'fk_departamento' => 16],
            ['nomProv' =>'TAMBOPATA', 'fk_departamento' => 17],
            ['nomProv' =>'MANU', 'fk_departamento' => 17],
            ['nomProv' =>'TAHUAMANU', 'fk_departamento' => 17],
            ['nomProv' =>'MARISCAL NIETO', 'fk_departamento' => 18],
            ['nomProv' =>'GENERAL SANCHEZ CERRO', 'fk_departamento' => 18],
            ['nomProv' =>'ILO', 'fk_departamento' => 18],
            ['nomProv' =>'PASCO', 'fk_departamento' => 19],
            ['nomProv' =>'DANIEL ALCIDES CARRION', 'fk_departamento' => 19],
            ['nomProv' =>'OXAPAMPA', 'fk_departamento' => 19],
            ['nomProv' =>'PIURA', 'fk_departamento' => 20],
            ['nomProv' =>'AYABACA', 'fk_departamento' => 20],
            ['nomProv' =>'HUANCABAMBA', 'fk_departamento' => 20],
            ['nomProv' =>'MORROPON', 'fk_departamento' => 20],
            ['nomProv' =>'PAITA', 'fk_departamento' => 20],
            ['nomProv' =>'SULLANA', 'fk_departamento' => 20],
            ['nomProv' =>'TALARA', 'fk_departamento' => 20],
            ['nomProv' =>'SECHURA', 'fk_departamento' => 20],
            ['nomProv' =>'PUNO', 'fk_departamento' => 21],
            ['nomProv' =>'AZANGARO', 'fk_departamento' => 21],
            ['nomProv' =>'CARABAYA', 'fk_departamento' => 21],
            ['nomProv' =>'CHUCUITO', 'fk_departamento' => 21],
            ['nomProv' =>'EL COLLAO', 'fk_departamento' => 21],
            ['nomProv' =>'HUANCANE', 'fk_departamento' => 21],
            ['nomProv' =>'LAMPA', 'fk_departamento' => 21],
            ['nomProv' =>'MELGAR', 'fk_departamento' => 21],
            ['nomProv' =>'MOHO', 'fk_departamento' => 21],
            ['nomProv' =>'SAN ANTONIO DE PUTINA', 'fk_departamento' => 21],
            ['nomProv' =>'SAN ROMAN', 'fk_departamento' => 21],
            ['nomProv' =>'SANDIA', 'fk_departamento' => 21],
            ['nomProv' =>'YUNGUYO', 'fk_departamento' => 21],
            ['nomProv' =>'MOYOBAMBA', 'fk_departamento' => 22],
            ['nomProv' =>'BELLAVISTA', 'fk_departamento' => 22],
            ['nomProv' =>'EL DORADO', 'fk_departamento' => 22],
            ['nomProv' =>'HUALLAGA', 'fk_departamento' => 22],
            ['nomProv' =>'LAMAS', 'fk_departamento' => 22],
            ['nomProv' =>'MARISCAL CACERES', 'fk_departamento' => 22],
            ['nomProv' =>'PICOTA', 'fk_departamento' => 22],
            ['nomProv' =>'RIOJA', 'fk_departamento' => 22],
            ['nomProv' =>'SAN MARTIN', 'fk_departamento' => 22],
            ['nomProv' =>'TOCACHE', 'fk_departamento' => 22],
            ['nomProv' =>'TACNA', 'fk_departamento' => 23],
            ['nomProv' =>'CANDARAVE', 'fk_departamento' => 23],
            ['nomProv' =>'JORGE BASADRE', 'fk_departamento' => 23],
            ['nomProv' =>'TARATA', 'fk_departamento' => 23],
            ['nomProv' =>'TUMBES', 'fk_departamento' => 24],
            ['nomProv' =>'CONTRALMIRANTE VILLAR', 'fk_departamento' => 24],
            ['nomProv' =>'ZARUMILLA', 'fk_departamento' => 24],
            ['nomProv' =>'CORONEL PORTILLO', 'fk_departamento' => 25],
            ['nomProv' =>'ATALAYA', 'fk_departamento' => 25],
            ['nomProv' =>'PADRE ABAD','fk_departamento' =>  25],
            ['nomProv' =>'PURUS', 'fk_departamento' => 25]
        ]);
    }
}
