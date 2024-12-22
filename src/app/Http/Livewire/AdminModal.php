<?php

namespace App\Http\Livewire;
use App\Models\Contact;
use App\Models\Category;
use Livewire\Component;
use Livewire\WithPagination;

class AdminModal extends Component
{
    use WithPagination;
    public $showModal = false;
    public $contact;


    public function render()
    {
        $categories = Category::all();
        $contacts = Contact::with('category')->paginate(7);
        return view('livewire.admin-modal', compact('categories', 'contacts'));
    }


    public function openModal($id)
    {
        $this->contact = Contact::with('category')->find($id);
        $this->showModal = true;
    }


    public function closeModal()
    {
        $this->showModal = false;
    }

}
