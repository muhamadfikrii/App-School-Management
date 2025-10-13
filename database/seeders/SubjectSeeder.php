<?php

namespace Database\Seeders;

use App\Models\Subject;
use App\Models\Teacher;
use App\Models\GroupSubject;
use Illuminate\Database\Seeder;

class SubjectSeeder extends Seeder
{
    public function run(): void
    {
        $teachers = Teacher::all();

        // Ambil id dari tiap kategori kelompok
        $kelompokA = GroupSubject::where('name', 'Kelompok A')->first()?->id;
        $kelompokB = GroupSubject::where('name', 'Kelompok B')->first()?->id;
        $kejuruan  = GroupSubject::where('name', 'Kejuruan')->first()?->id;

        $subjects = [
            // Kelompok A (Wajib Nasional)
            ['name' => 'Pendidikan Agama dan Budi Pekerti', 'code' => 'AGM01', 'group' => $kelompokA],
            ['name' => 'Pendidikan Pancasila dan Kewarganegaraan', 'code' => 'PPKN01', 'group' => $kelompokA],
            ['name' => 'Bahasa Indonesia', 'code' => 'BID01', 'group' => $kelompokA],
            ['name' => 'Matematika', 'code' => 'MAT01', 'group' => $kelompokA],
            ['name' => 'Sejarah Indonesia', 'code' => 'SEJ01', 'group' => $kelompokA],
            ['name' => 'Bahasa Inggris', 'code' => 'BING01', 'group' => $kelompokA],

            // Kelompok B (Wajib Sekolah)
            ['name' => 'Seni Budaya', 'code' => 'SEN01', 'group' => $kelompokB],
            ['name' => 'Pendidikan Jasmani, Olahraga, dan Kesehatan', 'code' => 'PJOK01', 'group' => $kelompokB],
            ['name' => 'Prakarya dan Kewirausahaan', 'code' => 'PRA01', 'group' => $kelompokB],

            // Kejuruan - PPLG
            ['name' => 'Pemrograman Dasar', 'code' => 'PPLG01', 'group' => $kejuruan],
            ['name' => 'Basis Data', 'code' => 'PPLG02', 'group' => $kejuruan],
            ['name' => 'Pemrograman Berorientasi Objek', 'code' => 'PPLG03', 'group' => $kejuruan],
            ['name' => 'Pengembangan Web dan Mobile', 'code' => 'PPLG04', 'group' => $kejuruan],
            ['name' => 'Desain UI/UX', 'code' => 'PPLG05', 'group' => $kejuruan],

            // Kejuruan - TKL
            ['name' => 'Komputer dan Jaringan Dasar', 'code' => 'TKL01', 'group' => $kejuruan],
            ['name' => 'Administrasi Infrastruktur Jaringan', 'code' => 'TKL02', 'group' => $kejuruan],
            ['name' => 'Teknologi Layanan Jaringan', 'code' => 'TKL03', 'group' => $kejuruan],

            // Kejuruan - AKL
            ['name' => 'Akuntansi Dasar', 'code' => 'AKL01', 'group' => $kejuruan],
            ['name' => 'Praktikum Akuntansi Perusahaan Dagang dan Jasa', 'code' => 'AKL02', 'group' => $kejuruan],
            ['name' => 'Aplikasi Pengolah Angka / Spreadsheet', 'code' => 'AKL03', 'group' => $kejuruan],
            ['name' => 'Akuntansi Lembaga / Pemerintahan', 'code' => 'AKL04', 'group' => $kejuruan],

            // Kejuruan - MPLB
            ['name' => 'Korespondensi', 'code' => 'MPLB01', 'group' => $kejuruan],
            ['name' => 'Kearsipan', 'code' => 'MPLB02', 'group' => $kejuruan],
            ['name' => 'Otomatisasi Tata Kelola Kepegawaian', 'code' => 'MPLB03', 'group' => $kejuruan],
            ['name' => 'Otomatisasi Tata Kelola Keuangan', 'code' => 'MPLB04', 'group' => $kejuruan],

            // Kejuruan - Teknik Otomotif (TO)
            ['name' => 'Pemeliharaan Mesin Kendaraan Ringan', 'code' => 'TO01', 'group' => $kejuruan],
            ['name' => 'Sistem Kelistrikan Otomotif', 'code' => 'TO02', 'group' => $kejuruan],
            ['name' => 'Chasis dan Suspensi', 'code' => 'TO03', 'group' => $kejuruan],

            // Kejuruan - TBSM
            ['name' => 'Pemeliharaan Mesin Sepeda Motor', 'code' => 'TBSM01', 'group' => $kejuruan],
            ['name' => 'Perawatan Kelistrikan Sepeda Motor', 'code' => 'TBSM02', 'group' => $kejuruan],
            ['name' => 'Pemeliharaan Sasis Sepeda Motor', 'code' => 'TBSM03', 'group' => $kejuruan],
        ];

        foreach ($subjects as $subject) {
            $subjectModel = Subject::factory()->create([
                'name' => $subject['name'],
                'code' => $subject['code'],
                'group_subject_id' => $subject['group'],
                'kkm' => fake()->randomElement([65, 70, 75]),
            ]);

            $subjectModel->teachers()->attach($teachers->random(rand(1, 2))->pluck('id'));
        }
    }
}
