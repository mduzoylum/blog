<?php

namespace App\Repositories;

use App\Models\Article;
use App\Models\ArticleTag;
use App\Models\Author;
use App\Models\Category;
use App\Models\CategoryTag;
use App\Models\Subscription;
use App\Models\Tag;
use Illuminate\Http\Request;
use App\Traits\ApiResponser;
use Illuminate\Support\Facades\Validator;

class PostRepositoryMysql implements \App\Repositories\PostRepositoryInterface
{
    use ApiResponser;

    ///////////////////////////////////////////
    /// Categories
    public function indexCategory()
    {
        $category = Category::all();
        return $this->successResponse(200, $category, "Categories retrieved successfully");
    }

    public function storeCategory(Request $request)
    {
        $validation = Validator::make($request->all(), [
            'name' => 'required|unique:category,name|max:255'
        ]);

        if ($validation->fails()) {
            return $this->errorResponse(404, [], $validation->errors()->first());
        }

        Category::create($request->only('name'));
        return $this->successResponse(200, [], 'Category created successfully');
    }

    public function showCategory($id)
    {
        $category = Category::with('tags')->find($id);
        if (!$category) {
            return $this->errorResponse(404, [], 'Category not found');
        }
        return $this->successResponse(200, $category, 'Category found');
    }

    public function updateCategory(Request $request, $id)
    {
        $category = Category::find($id);
        if (!$category) {
            return $this->errorResponse(404, [], 'Category not found');
        }

        //if who wants to update it with its old value, it will not get an error
        $validation = Validator::make($request->all(), [
            'name' => 'required|max:255|unique:category,name,' . $category->id
        ]);

        if ($validation->fails()) {
            return $this->errorResponse(409, [], $validation->errors()->first());
        }

        $category->update($request->all());

        return $this->successResponse(200, $category, 'Category updated successfully');
    }

    public function destroyCategory($id)
    {
        $category = Category::findOrFail($id);
        if (!$category) {
            return $this->errorResponse(404, [], 'Category not found');
        }
        $category->delete();

        return $this->successResponse(200, [], 'Category deleted successfully');
    }

    ///////////////////////////////////////////
    ///Articles
    public function indexArticle()
    {
        $article = Article::all();
        return $this->successResponse(200, $article, "Article retrieved successfully");
    }

    public function storeArticle(Request $request)
    {
        $validation = Validator::make($request->all(), [
            'name' => 'required|unique:category,name|max:255',
            'author_id' => 'required'
        ]);

        if ($validation->fails()) {
            return $this->errorResponse(404, [], $validation->errors()->first());
        }

        Article::create($request->all());
        return $this->successResponse(200, [], 'Article created successfully');
    }

    public function showArticle($id)
    {
        $article = Article::with('tags')->find($id);
        if (!$article) {
            return $this->errorResponse(404, [], 'Article not found');
        }
        return $this->successResponse(200, $article, 'Article found');
    }

    public function updateArticle(Request $request, $id)
    {
        $article = Article::find($id);
        if (!$article) {
            return $this->errorResponse(404, [], 'Article not found');
        }

        //if who wants to update it with its old value, it will not get an error
        $validation = Validator::make($request->all(), [
            'name' => 'required|max:255|unique:category,name,' . $article->id,
            'author_id' => 'required'
        ]);

        if ($validation->fails()) {
            return $this->errorResponse(409, [], $validation->errors()->first());
        }

        $article->update($request->all());

        return $this->successResponse(200, $article, 'Article updated successfully');
    }

    public function destroyArticle($id)
    {
        $article = Article::find($id);
        if (!$article) {
            return $this->errorResponse(404, [], 'Article not found');
        }
        $article->delete();

        return $this->successResponse(200, [], 'Article deleted successfully');
    }

    ///////////////////////////////////////////
    ///Authors

    public function indexAuthor()
    {
        $author = Author::all();
        return $this->successResponse(200, $author, "Author retrieved successfully");
    }

    public function storeAuthor(Request $request)
    {
        $validation = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'surname' => 'required|max:255'
        ]);

        if ($validation->fails()) {
            return $this->errorResponse(404, [], $validation->errors()->first());
        }

        Author::create($request->all());
        return $this->successResponse(200, [], 'Author created successfully');
    }

    public function showAuthor($id)
    {
        $author = Author::find($id);
        if (!$author) {
            return $this->errorResponse(404, [], 'Author not found');
        }
        return $this->successResponse(200, $author, 'Author found');
    }

    public function updateAuthor(Request $request, $id)
    {
        $author = Author::find($id);
        if (!$author) {
            return $this->errorResponse(404, [], 'Author not found');
        }

        //if who wants to update it with its old value, it will not get an error
        $validation = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'surname' => 'required|max:255'
        ]);

        if ($validation->fails()) {
            return $this->errorResponse(409, [], $validation->errors()->first());
        }

        $author->update($request->all());

        return $this->successResponse(200, $author, 'Author updated successfully');
    }

    public function destroyAuthor($id)
    {
        $author = Author::find($id);
        if (!$author) {
            return $this->errorResponse(404, [], 'Author not found');
        }
        $author->delete();

        return $this->successResponse(200, [], 'Author deleted successfully');
    }

    ///////////////////////////////////////////
    ///Tags
    public function indexTag()
    {
        $tag = Tag::all();
        return $this->successResponse(200, $tag, "Categories retrieved successfully");
    }

    public function storeTag(Request $request)
    {
        $validation = Validator::make($request->all(), [
            'name' => 'required|unique:category,name|max:255'
        ]);

        if ($validation->fails()) {
            return $this->errorResponse(404, [], $validation->errors()->first());
        }

        Tag::create($request->all());
        return $this->successResponse(200, [], 'Tag created successfully');
    }

    public function showTag($id)
    {
        $tag = Tag::find($id);
        if (!$tag) {
            return $this->errorResponse(404, [], 'Tag not found');
        }
        return $this->successResponse(200, $tag, 'Tag found');
    }

    public function updateTag(Request $request, $id)
    {
        $tag = Tag::find($id);
        if (!$tag) {
            return $this->errorResponse(404, [], 'Tag not found');
        }

        //if who wants to update it with its old value, it will not get an error
        $validation = Validator::make($request->all(), [
            'name' => 'required|max:255|unique:category,name,' . $tag->id
        ]);

        if ($validation->fails()) {
            return $this->errorResponse(409, [], $validation->errors()->first());
        }

        $tag->update($request->all());

        return $this->successResponse(200, $tag, 'Tag updated successfully');
    }

    public function destroyTag($id)
    {
        $tag = Tag::findOrFail($id);
        if (!$tag) {
            return $this->errorResponse(404, [], 'Tag not found');
        }
        $tag->delete();

        return $this->successResponse(200, [], 'Tag deleted successfully');
    }

    ///////////////////////////////////////////
    ///Subsciptions
    public function storeSubsciption(Request $request)
    {
        $validation = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255'
        ]);

        if ($validation->fails()) {
            return $this->errorResponse(404, [], $validation->errors()->first());
        }

        Subscription::create($request->all());
        return $this->successResponse(200, [], 'Subscription created successfully');
    }

    ///////////////////////////////////////////
    ///Articles Tags
    public function storeArticleTag(Request $request)
    {
        $validation = Validator::make($request->all(), [
            'article_id' => 'required',
            'tag_id' => 'required'
        ]);

        if ($validation->fails()) {
            return $this->errorResponse(404, [], $validation->errors()->first());
        }

        ArticleTag::create($request->all());
        return $this->successResponse(200, [], 'Created successfully');
    }

    ///////////////////////////////////////////
    ///Categories Tags
    public function storeCategoryTag(Request $request)
    {
        $validation = Validator::make($request->all(), [
            'category_id' => 'required',
            'tag_id' => 'required'
        ]);

        if ($validation->fails()) {
            return $this->errorResponse(404, [], $validation->errors()->first());
        }

        CategoryTag::create($request->all());
        return $this->successResponse(200, [], 'Created successfully');
    }
}
