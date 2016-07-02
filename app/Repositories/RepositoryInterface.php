<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Repositories;
use Illuminate\Database\Eloquent\Model;

/**
 * Interface that will be used by all repositories in the project.
 * @author Harry
 */
interface RepositoryInterface {
    /**
     * Return all models on a page 
     * @param integer $perPage
     * @param integer $additionalFilters
     * @return array
     */
    public function byPage($perPage, $additionalFilters);
    
    /**
     * Return a model by ID
     * @param integer $id
     * @return Model
     */
    public function byId($id);
    
    /**
     * Return a model by its URL
     * @param string $url
     * @return Model
     */
    public function byUrl($url);
    
    /**
     * Return a list of all models
     * @return array
     */
    public function all();
    
    /**
     * Save a model to the database
     * @param Model $model
     * @return Model
     */
    public function create(Model $model);
    
    /**
     * Update a model in the database
     * @param Model $model
     * @return Model
     */
    public function update(Model $model);
    
    /**
     * Delete a model in the database
     * @param Model $model
     * @return Model
     */
    public function delete(Model $model);
}
