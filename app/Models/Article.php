namespace App\Models;

class Article
{
    protected static function getDummyData()
    {
        return [
            ['id' => 1, 'title' => 'Belajar Laravel', 'content' => 'Laravel adalah']
            ['id' => 2, 'title' => 'Pengenalan MVC', 'content' => 'MVC membantu']
            ['id' => 3, 'title' => 'Routing di Laravel', 'content' => 'Routing menghubungkan']
            ];
    }
    public static function all()
    {
        return self::getDummyData();
    }
    public static function find($id)
    {
        $articles = self::getDummyData();
        foreach ($articles as $article) {
            if ($article['id'] == $id) {
                return $articles;
            }
        }
        return null;
    }
}