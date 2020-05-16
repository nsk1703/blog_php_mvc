<?php


class Pagination extends Model{

    private $query;
    private $queryCount;
    private $perPage;
    private $count;
    private $items;

    public function __construct(

        string $query,
        string $queryCount,
        int $perPage = 12

    )
    {
        $this->query = $query;
        $this->queryCount = $queryCount;;
        $this->perPage = $perPage;
    }
    
    private function getCurrentPage($name, int $default = null): int
    {
        if(!isset($_GET[$name])) return $default;
        
        if(!filter_var($_GET[$name], FILTER_VALIDATE_INT)){
           throw new \Exception("le numero de page est invalide");
        }
        return (int)$_GET[$name];
    }

    private function getPages($idPages): int
    {   
        // debug($this->getBdd());
        if($this->count === null)
        {   
            // debug($this->queryCount);
            $this->count = (int)$this->getBdd()
                ->query($this->queryCount)
                ->fetch(PDO::FETCH_NUM)[0];
                // debug($this->count);
                
        }
        $pages = ceil((int)$this->count / $this->perPage);
        // debug($pages);
        return $pages;
    }
    
    public function getItems($id): array
    {
        $posts= [];

        if(empty($posts)){

            $currentPage = $this->getCurrentPage('pg', 1);
            // debug($currentPage);
            $pages = $this->getPages($id);
            // debug($pages);
            if($currentPage > $pages){
                throw new \Exception('Cette Page n\'existe pas');
            }
            // debug($this->query);
            $offset = $this->perPage * ($currentPage - 1);
            $req = $this->getBdd()->query($this->query." LIMIT {$this->perPage} OFFSET $offset");
            // $req->execute();
                // debug($req);
            while($data = $req->fetch(PDO::FETCH_ASSOC)){
                // debug($data);
                $posts[] = new Post($data);
            }
            // debug($posts);
        }

        return $posts;
    }

    public function previousLink(string $link)
    {
        $currentPage = $this->getCurrentPage('pg', 1);
        if($currentPage <=1 ) return null;
        if($currentPage >= 2) $link .= ($currentPage - 1);
        return <<<HTML
            <a href="{$link}" class="btn btn-outline-primary mt-4">&laquo; Page Précedente</a>
HTML;
    }
    public function nextLink(string $link)
    {
        $currentPage = $this->getCurrentPage('pg', 1);
        $pages = $this->getPages($id);
        if($currentPage >= $pages) return null;
        $link .= ($currentPage + 1);
        return <<<HTML
            <a href="{$link}" class="btn btn-outline-primary mt-4 ml-auto"> Page Suivante &raquo;</a>
HTML;
    }
}