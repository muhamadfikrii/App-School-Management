<x-pdf-layout>

    {{ $finalGrade->semester }}

            @foreach($finalGrade->gradesDetail as $grade)
                {{ $grade->subject->name }} {{ $grade->final_score }} {{ $grade->predicate }}
            @endforeach

</x-pdf-layout>
