<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Repositories;

use App\Post;
use Illuminate\Database\Eloquent\Model;
use App\Repositories\RepositoryInterface;

/**
 * Description of TaskRepository
 *
 * @author Harry
 */
class PostRepository implements RepositoryInterface{
    
    /**
     * Return all models on a page 
     * @param integer $perPage
     * @param integer $pageNumber
     * @return array
     */
    public function byPage($perPage,$additionalFilters = []){
        if(!empty($additionalFilters)){
            $posts = Post::where($additionalFilters)->orderBy('published_at','desc');
        }else{
            $posts = Post::orderBy('published_at','desc');
        }
        $posts = $posts->paginate($perPage);
        return $posts;
    }
    
    /**
     * Return a model by ID
     * @param integer $id
     * @return Model
     */
    public function byId($id){
        return Post::findOrFail($id);
    }
    
    /**
     * Return a model by its URL
     * @param string $url
     * @return Model
     */
    public function byUrl($url){
        return Post::where(array('url' => $url))->first();
    }
    
    /**
     * Return a list of all models
     * @return array
     */
    public function all(){
        return Post::all()->orderBy('published_at','desc');
    }
    
    /**
     * Save a model to the database
     * @param Model $model
     * @return Model
     */
    public function create(Model $model){
        $model->save();
        return $model;
    }
    
    /**
     * Update a model in the database
     * @param Model $model
     * @return Model
     */
    public function update(Model $model){
        $model->save();
        return $model;
    }
    
    /**
     * Delete a model in the database
     * @param Model $model
     * @return Model
     */
    public function delete(Model $model){
        $model->delete();
    }
    
}
