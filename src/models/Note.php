<?php 

namespace models;

use models\AbstractModel;

class Note extends AbstractModel
{
    private string $title;
    private string $slug;
    private string $content;

    protected string $table = 'notes'; // Défini la table où chercher les données
    protected string $fields = 'title, slug, content'; // Renseigne les champs de la table
    protected string $values = ':title, :slug, :content'; // Indique les valeurs pour SQL
    /**
     * Défini les valeurs à binder (:title, :slug, :content, :image)
     * Bind: Attache une valeur à une variable pour la requête SQL
     */
    protected array $valuesBinded = [
        ':title' => '',
        ':slug' => '',
        ':content' => ''
    ];

    /**
     * Method bindValues()
     * To bind values to the query
     * @param void
     * @return void
     */
    public function bindValues(): void
    {
        $this->valuesBinded[':title'] = $this->title;
        $this->valuesBinded[':slug'] = $this->slug;
        $this->valuesBinded[':content'] = $this->content;
    }

    /**
     * Get the value of title
     */ 
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set the value of title
     *
     * @return  self
     */ 
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get the value of content
     */ 
    public function getContent()
    {
        return $this->content;
    }

    /**
     * Set the value of content
     *
     * @return  self
     */ 
    public function setContent($content)
    {
        $this->content = $content;

        return $this;
    }

    /**
     * Get the value of slug
     */ 
    public function getSlug()
    {
        return $this->slug;
    }

    /**
     * Set the value of slug
     *
     * @return  self
     */ 
    public function setSlug($slug)
    {
        $this->slug = $slug;

        return $this;
    }
}
// Don't write any code below this line