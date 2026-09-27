<?php

namespace App\Http\Controllers;

use App\Models\Book; 
use Illuminate\Http\Request;

class BookController extends Controller
{
    // ១. បង្ហាញបញ្ជីសៀវភៅទាំងអស់
    public function index()
    {
        $books = Book::all(); 
        return view('books.index', compact('books'));
    }

    // ២. បង្ហាញ Form សម្រាប់បន្ថែមសៀវភៅថ្មី
    public function create()
    {
        return view('books.create');
    }

    // ៣. រក្សាទុកទិន្នន័យសៀវភៅថ្មី
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'author' => 'required',
            'price' => 'required|numeric',
            'published_date' => 'required|date',
        ]);

        Book::create($request->all());
        return redirect()->route('books.index')->with('success', 'បន្ថែមសៀវភៅបានជោគជ័យ!');
    }

    // --- កូដដែលអ្នកត្រូវបន្ថែមថ្មី (ADD THESE BELOW) ---

    // ៤. បង្ហាញព័ត៌មានលម្អិតនៃសៀវភៅ (សម្រាប់ប៊ូតុង View)
    public function show($id)
    {
        $book = Book::findOrFail($id);
        return view('books.show', compact('book'));
    }

    // ៥. បង្ហាញ Form សម្រាប់កែប្រែទិន្នន័យ (សម្រាប់ប៊ូតុង Edit)
    public function edit($id)
    {
        $book = Book::findOrFail($id);
        return view('books.edit', compact('book'));
    }

    // ៦. ធ្វើបច្ចុប្បន្នភាពទិន្នន័យដែលបានកែប្រែរួច
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'author' => 'required',
            'price' => 'required|numeric',
            'published_date' => 'required|date',
        ]);

        $book = Book::findOrFail($id);
        $book->update($request->all());

        return redirect()->route('books.index')->with('success', 'កែប្រែព័ត៌មានបានជោគជ័យ!');
    }

    // ៧. លុបទិន្នន័យសៀវភៅ (សម្រាប់ប៊ូតុង Delete)
    public function destroy($id)
    {
        $book = Book::findOrFail($id);
        $book->delete();

        return redirect()->route('books.index')->with('success', 'លុបសៀវភៅបានជោគជ័យ!');
    }
}