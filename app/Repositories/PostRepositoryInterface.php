<?php

namespace App\Repositories;
use App\Models\Category;
use Illuminate\Http\Request;

interface PostRepositoryInterface
{
public function indexCategory();
public function storeCategory(Request $request);
public function showCategory($id);
public function updateCategory(Request $request,$id);
public function destroyCategory($id);

public function indexArticle();
public function storeArticle(Request $request);
public function showArticle($id);
public function updateArticle(Request $request,$id);
public function destroyArticle($id);

public function indexAuthor();
public function storeAuthor(Request $request);
public function showAuthor($id);
public function updateAuthor(Request $request,$id);
public function destroyAuthor($id);

public function indexTag();
public function storeTag(Request $request);
public function showTag($id);
public function updateTag(Request $request,$id);
public function destroyTag($id);


public function storeSubsciption(Request $request);
public function storeArticleTag(Request $request);
public function storeCategoryTag(Request $request);

}
