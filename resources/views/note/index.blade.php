<x-layout>
    <div class="note-container">
        <a href="{{route('note.create')}}" class="new-note-btn">New Note</a>
        <div class="notes">
            @foreach ($notes as $note)
            <div class="note">
                <div class="note-body">
                    {{ Str::words($note->note , 30) }}
                    {{-- {{$note->note}} --}}
                </div>
                <div class="note-buttons">
                    <a href="{{route('note.show' , $note)}}" class="note-edit-button">View</a>
                    <a href="{{route('note.edit' , $note)}}" class="note-edit-button">Edit</a>
                    <form action="{{route('note.destroy' , $note)}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button class="note-delete-button">Delete</button>
                    </form>
                </div>

            </div>
                
            @endforeach
            

        </div>
        {{$notes->links()}}
       
    </div>
</x-layout>

{{-- // Route::middleware(['auth' , 'verified'])->group(function () {
    // Route::get('/note',[NoteController::class,'index'])->name('note.index');
    // Route::get('/note/create',[NoteController::class,'create'])->name('note.create');
    // Route::post('/note',[NoteController::class,'store'])->name('note.store');
    // Route::get('/note/{id}',[NoteController::class,'show'])->name('note.show');
    // Route::get('/note/{id}/edit',[NoteController::class,'edit'])->name('note.edit');
    // Route::put('/note/{id}',[NoteController::class,'update'])->name('note.update');
    // Route::delete('/note/{id}',[NoteController::class,'destroy'])->name('note.destroy');
    
//     Route::resource('note' , NoteController::class);
// }); --}}

{{-- // Route::get('/', [WelcomeController::class,'welcome'])->name('welcome'); --}}