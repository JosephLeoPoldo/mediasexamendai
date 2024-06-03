<?php
namespace App\Http\Controllers;
use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
class BookController extends Controller
{
    public function index(Request $request): View
    {
       return view('books.index', [
            'books' => $request->user()->books()->get(),
       ]);
    }
    public function create(): View
    {
        return view('books.create');
    }
    public function edit(Book $book): View
    {
        return view('books.edit', [
            'book' =>$book,
        ]);
    }
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'title' => 'required|max:255',
            'author' => 'required|max:255',
            'year' => 'required|integer',
            'synopsis' => 'required',
            'cover_url' => 'required|url',
        ]);
        $request->user()->books()->create($validated);
        return redirect(route('books.index'));
    }
    public function update(Request $request, Book $book): RedirectResponse
    {
        $validated = $request->validate([
            'title' => 'required|max:255',
            'author' => 'required|max:255',
            'year' => 'required|integer',
            'synopsis' => 'required',
            'cover_url' => 'required|url',
        ]);
        $book->update($validated);
        return redirect()->route('books.index');
    }
    public function destroy(Book $book): RedirectResponse
    {
        $book->delete();
        return redirect()->route('books.index');
    }}