<x-pdf-layout>
<!-- Identitas Siswa -->
    <table class="w-full text-base mb-8 mt-8 border-collapse leading-snug" style="font-family: 'Times New Roman', serif;">
        <tbody>
            <tr>
                <td class="text-left align-top py-1 pr-6 w-1/5">Nama Sekolah</td>
                <td class="align-top py-1 font-bold w-1/3">: SMKN 4 KUNINGAN</td>
                <td class="text-left align-top py-1 pr-6 w-1/5">Semester</td>
                <td class="align-top py-1 font-bold w-1/3">: {{ $finalGrade->semester }}</td>
            </tr>
            <tr>
                <td class="text-left align-top py-1 pr-6">Nama</td>
                <td class="align-top py-1 font-bold">: {{ $finalGrade->student->full_name }}</td>
                <td class="text-left align-top py-1 pr-6">NISN</td>
                <td class="align-top py-1 font-bold">: {{ $finalGrade->student->nisn }}</td>
            </tr>
            <tr>
                <td class="text-left align-top py-1 pr-6">Kelas</td>
                <td class="align-top py-1 font-bold">: {{ $finalGrade->classRombel->name }}</td>
                <td class="text-left align-top py-1 pr-6">Tahun Ajaran</td>
                <td class="align-top py-1 font-bold">: {{ $finalGrade->academicYear->name }}</td>
            </tr>
        </tbody>
    </table>




    <!-- Nilai Akademik -->
    <table class="w-full border-collapse border border-gray-800 text-sm text-gray-900 font-serif">
        <thead>
            <tr class="bg-gray-200 text-center font-bold text-gray-800">
                <th class="border border-gray-800 px-3 py-2">No</th>
                <th class="border border-gray-800 px-3 py-2">Mata Pelajaran</th>
                <th class="border border-gray-800 px-3 py-2">KKM</th>
                <th class="border border-gray-800 px-3 py-2">Nilai</th>
                <th class="border border-gray-800 px-3 py-2">Predikat</th>
                <th class="border border-gray-800 px-3 py-2">Deskripsi</th>
            </tr>
        </thead>

        <tbody>
            @php
                $groupedGrades = $finalGrade->gradesDetail
                    ->groupBy(fn($item) => $item->subject->groupSubject->name ?? 'Lainnya');
                $sortGroups = collect([
                    'Kelompok A',
                    'Kelompok B', 
                    'Kejuruan', 
                    'Lainnya']);
                    
                $groupedGrades = $groupedGrades->sortBy(fn($_, $key) => $sortGroups->search($key) ?? '-');
                $no = 1;
            @endphp

            @foreach($groupedGrades as $groupName => $grades)
                <tr class="bg-gray-300 font-bold text-gray-800">
                    <td colspan="6" class="border border-gray-800 px-3 py-2 uppercase tracking-wide">
                        {{ $groupName }}
                    </td>
                </tr>

                @foreach($grades as $grade)
                    <tr class="{{ $loop->odd ? 'bg-white' : 'bg-gray-50' }}">
                        <td class="border border-gray-800 px-3 py-2 text-center">{{ $no++ }}</td>
                        <td class="border border-gray-800 px-3 py-2">{{ $grade->subject->name }}</td>
                        <td class="border border-gray-800 px-3 py-2 text-center">{{ $grade->kkm }}</td>
                        <td class="border border-gray-800 px-3 py-2 text-center font-semibold">{{ $grade->final_score }}</td>

                        <!-- Predikat -->
                        <td class="border border-gray-800 px-3 py-2 text-center">
                            <span class="px-3 py-1 rounded text-sm font-bold
                                {{ $grade->predicate === 'A' ? ' text-black' : '' }}
                                {{ $grade->predicate === 'B' ? ' text-black' : '' }}
                                {{ $grade->predicate === 'C' ? ' text-black' : '' }}
                                {{ $grade->predicate === 'D' ? ' text-black' : '' }}
                            ">
                                {{ $grade->predicate }}
                            </span>
                        </td>

                        <!-- Deskripsi -->
                        <td class="border text-balance border-gray-800 px-3 py-2 text-left italic text-gray-700">
                            
                        </td>
                    </tr>
                @endforeach
            @endforeach

                    @php
                        $totalNilai = $finalGrade->gradesDetail->sum('final_score'); // jumlah semua nilai
                        $jumlahMapel = $finalGrade->gradesDetail->count(); // jumlah mata pelajaran
                        $rataRata = $jumlahMapel > 0 ? number_format($totalNilai / $jumlahMapel, 2) : 0;
                    @endphp

                <tr class="font-bold bg-gray-100">
                    <td colspan="2" class="text-right border border-black px-3 py-2">Jumlah</td>
                    <td colspan="2" class="text-center border border-black px-3 py-2"> {{ $totalNilai }} </td>
                    <td class="border border-black"></td>
                    <td class="border border-black"></td>
                </tr>

                <tr class="font-bold bg-gray-100">
                    <td colspan="2" class="text-right border border-black px-3 py-2">Rata-Rata</td>
                    <td colspan="2" class="text-center border border-black px-3 py-2"> {{ $rataRata }} </td>
                    <td class="border border-black"></td>
                    <td class="border border-black"></td>
                </tr>
        </tbody>
    </table>
</x-pdf-layout>
