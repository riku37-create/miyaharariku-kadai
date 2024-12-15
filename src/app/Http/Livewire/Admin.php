<?php

namespace App\Http\Livewire;
use App\Models\Contact;
use App\Models\Category;
use Livewire\Component;

class Admin extends Component
{
    public $showModal = false;
    public $contact;
    public $categories;

    // 検索フォームのフィルター項目
    public $search;
    public $gender;
    public $date;
    public $category_id;


    public function render()
    {
        $query = Contact::query();  // クエリビルダを初期化

        // 検索条件を追加
        if ($this->search) {
            $query->search($this->search); // 部分一致検索
        }

        if ($this->gender) {
            $query->gender($this->gender);  // 性別でフィルタリング
        }

        if ($this->date) {
            $query->date($this->date);  // 日付でフィルタリング
        }

        if ($this->category_id) {
            $query->category($this->category_id);  // カテゴリでフィルタリング
        }

        // 最終的に取得したいデータをページネーションで取得
        $contacts = $query->with('category')->paginate(7);
        $this->categories = Category::all();
        return view('livewire.admin', compact('contacts'));
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
