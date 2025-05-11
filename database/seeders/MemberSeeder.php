<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MemberSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('members')->insert([
            ['name' => 'AFIF FIRDAUS BIN MOHD ZULKIFLI', 'matric_no' => 'D20231105931', 'batch' => 'Valta'],
            ['name' => 'AFIQAH AQILAH BINTI CHE JAMIL', 'matric_no' => 'D20231106930', 'batch' => 'Valta'],
            ['name' => 'AHMAD MUHAMMAD BIN JASMI', 'matric_no' => 'D20231108364', 'batch' => 'Valta'],
            ['name' => 'AIDA FARHANA BINTI MOHD ARSHAD', 'matric_no' => 'D20231108684', 'batch' => 'Valta'],
            ['name' => 'AIMAN BIN MOHD HISHAM', 'matric_no' => 'D20231106397', 'batch' => 'Valta'],
            ['name' => 'ANWAR ZAKARIA BIN ABD RAHMAN', 'matric_no' => 'D20231108164', 'batch' => 'Valta'],
            ['name' => 'DORITHY SASHA ANAK UBANG', 'matric_no' => 'D20231105604', 'batch' => 'Valta'],
            ['name' => 'EISYA NUR HUMAIRA BINTI MOHD NORAZMI', 'matric_no' => 'D20231107614', 'batch' => 'Valta'],
            ['name' => 'HARITH TAHFIZ BIN ABD AZIZ', 'matric_no' => 'D20231108879', 'batch' => 'Valta'],
            ['name' => 'INSYIRAH ZAHIRAH BINTI MATZIN', 'matric_no' => 'D20231106141', 'batch' => 'Valta'],
            ['name' => 'IRFAN HAKIM BIN ISHAK', 'matric_no' => 'D20231106451', 'batch' => 'Valta'],
            ['name' => 'KHAIRUNNISA BINTI HOSDI', 'matric_no' => 'D20231106503', 'batch' => 'Valta'],
            ['name' => 'LEE HUI YI', 'matric_no' => 'D20231106300', 'batch' => 'Valta'],
            ['name' => 'MIMI AZWA BINTI LEMAN', 'matric_no' => 'D20231108892', 'batch' => 'Valta'],
            ['name' => 'MINSYA NUR DIANA BINTI MUHAMAD BURHANORDIN', 'matric_no' => 'D20231108897', 'batch' => 'Valta'],
            ['name' => 'MUHAMMAD ADAM BIN MAZLAN', 'matric_no' => 'D20231108067', 'batch' => 'Valta'],
            ['name' => 'MUHAMMAD ADIB HAIKAL BIN ANUAR', 'matric_no' => 'D20231106004', 'batch' => 'Valta'],
            ['name' => 'MUHAMMAD ALIFF SYAZRIL BIN JAMALUDIN', 'matric_no' => 'D20231105486', 'batch' => 'Valta'],
            ['name' => 'MUHAMMAD AMIRUL HAKIMI BIN HAMDI', 'matric_no' => 'D20231107694', 'batch' => 'Valta'],
            ['name' => 'MUHAMMAD ARASH BIN HASZELAN', 'matric_no' => 'D20231107697', 'batch' => 'Valta'],
            ['name' => 'MUHAMMAD ARIF BIN ZAHARUDIN', 'matric_no' => 'D20231106538', 'batch' => 'Valta'],
            ['name' => 'MUHAMMAD FAHMI IDHAM BIN MUSA', 'matric_no' => 'D20231105850', 'batch' => 'Valta'],
            ['name' => 'MUHAMMAD HAFIZ HAIKAL BIN KAMARUDIN', 'matric_no' => 'D20231107910', 'batch' => 'Valta'],
            ['name' => 'MUHAMMAD HANEEF BIN SHAHUL HAMEED', 'matric_no' => 'D20231108640', 'batch' => 'Valta'],
            ['name' => 'MUHAMMAD HARIZ HUSAINI BIN AZMI', 'matric_no' => 'D20231108465', 'batch' => 'Valta'],
            ['name' => 'MUHAMMAD IRMAN BIN IRWAN', 'matric_no' => 'D20231106440', 'batch' => 'Valta'],
            ['name' => 'MUHAMMAD QAYYIM HADIF BIN NAZARMASAGOS', 'matric_no' => 'D20231107435', 'batch' => 'Valta'],
            ['name' => 'MUHAMMAD SHARUL AIMAN BIN SHAHROM', 'matric_no' => 'D20231108108', 'batch' => 'Valta'],
            ['name' => 'MUHAMMAD SYAFILI BIN A.GHANI', 'matric_no' => 'D20231108077', 'batch' => 'Valta'],
            ['name' => 'NISRINA NABIHAH BINTI ZURIN', 'matric_no' => 'D20231105899', 'batch' => 'Valta'],
            ['name' => 'NOR AZLINA BINTI MOHD ARIFIN', 'matric_no' => 'D20231107771', 'batch' => 'Valta'],
            ['name' => 'NORSABILLA BALQIS BINTI KAMARUL NIZAM', 'matric_no' => 'D20231107712', 'batch' => 'Valta'],
            ['name' => 'NUHA FARISHA BINTI MOHD JAIDI', 'matric_no' => 'D20231105840', 'batch' => 'Valta'],
            ['name' => 'NUR AISHAH BINTI MOHAMMAD', 'matric_no' => 'D20231106560', 'batch' => 'Valta'],
            ['name' => 'NUR ALIA MAISARA BINTI MOHAMAD RIZZAL', 'matric_no' => 'D20231107028', 'batch' => 'Valta'],
            ['name' => 'NUR AMALIN SYAFIQAH BINTI AZIZ', 'matric_no' => 'D20231108172', 'batch' => 'Valta'],
            ['name' => 'NUR AQILAH QAISARA BINTI SHAHRIZAL', 'matric_no' => 'D20231108168', 'batch' => 'Valta'],
            ['name' => 'NUR FARDIYANA BINTI AZMIH', 'matric_no' => 'D20231105663', 'batch' => 'Valta'],
            ['name' => 'NUR FISYARH AYUNI BINTI MUHAMED FAIZAL', 'matric_no' => 'D20231107138', 'batch' => 'Valta'],
            ['name' => 'NUR HASHA HERDINA BINTI HASRUL HISHAM', 'matric_no' => 'D20231107530', 'batch' => 'Valta'],
            ['name' => 'NUR IMANIENA WAHEEDA BINTI ISMAIL', 'matric_no' => 'D20231107274', 'batch' => 'Valta'],
            ['name' => 'NUR NATASHA HANIM BINTI AZMI', 'matric_no' => 'D20231105639', 'batch' => 'Valta'],
            ['name' => 'NUR RAIHANAH BINTI MAIL', 'matric_no' => 'D20231107443', 'batch' => 'Valta'],
            ['name' => 'NUR SHARHAINA BINTI RASIMAN', 'matric_no' => 'D20231107793', 'batch' => 'Valta'],
            ['name' => 'NUR SYAFEQA ZULAIKHA BINTI ZUR’AINI', 'matric_no' => 'D20231108655', 'batch' => 'Valta'],
            ['name' => 'NURFARAH ELYSSA BT MOHD MUSTAPHA', 'matric_no' => 'D20231107329', 'batch' => 'Valta'],
            ['name' => 'NURIN SOFEA BINTI ZAHARI', 'matric_no' => 'D20231108185', 'batch' => 'Valta'],
            ['name' => 'NURSYAFIQAH MADIHAH BINTI ALI', 'matric_no' => 'D20231108673', 'batch' => 'Valta'],
            ['name' => 'NURUL AL NISHAH BINTI ABDUL MUHID', 'matric_no' => 'D20231107775', 'batch' => 'Valta'],
            ['name' => 'NURUL ATHIRAH BINTI SUHAIMI', 'matric_no' => 'D20231107927', 'batch' => 'Valta'],
            ['name' => 'NURUL NADIA BINTI ABDUL MALIK', 'matric_no' => 'D20231107557', 'batch' => 'Valta'],
            ['name' => 'SHAHRUL NIZAM BIN RAMLI', 'matric_no' => 'D20231106149', 'batch' => 'Valta'],
            ['name' => 'SITI AFIQAH BINTI MOHAMAD HANIF', 'matric_no' => 'D20231105852', 'batch' => 'Valta'],
            ['name' => 'SITI AISYAH BINTI AZIZAN', 'matric_no' => 'D20231108910', 'batch' => 'Valta'],
            ['name' => 'SITI NURFATIHAH BINTI AZMAN', 'matric_no' => 'D20231107938', 'batch' => 'Valta'],
            ['name' => 'TAMIL AMUTHAN A/L ARUMUGAM', 'matric_no' => 'D20231106276', 'batch' => 'Valta'],
            ['name' => 'TENGKU HAZIQ NAIM BIN TENGKU MOKHTAR', 'matric_no' => 'D20231106540', 'batch' => 'Valta'],
            ['name' => 'WAN NUR AFIQAH BINTI WAN MOHD ZUNAIDI', 'matric_no' => 'D20231107687', 'batch' => 'Valta'],
        ]);
    }
}
