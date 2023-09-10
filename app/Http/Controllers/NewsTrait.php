<?php

namespace App\Http\Controllers;

trait NewsTrait
{
    public function getNews(int $id = null): array
    {
        $news = [
            [
                'id' => 1,
                'category_id' => 1,
                'title' => 'title-1',
                'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Suscipit numquam magni deleniti reprehenderit provident nemo.',
                'created_at' => '23.11.2004'
            ],
            [
                'id' => 2,
                'category_id' => 3,
                'title' => 'title-2',
                'description' => 'Duis aute irure dolor in reprehenderit in voluptate, qui blanditiis praesentium voluptatum deleniti atque corrupti, quos dolores et quas molestias excepturi sint, obcaecati cupiditate non',
                'created_at' => '07.02.2021'
            ],
            [
                'id' => 3,
                'category_id' => 3,
                'title' => 'title-3',
                'description' => 'Excepteur sint occaecat cupidatat non proident, qui blanditiis praesentium voluptatum deleniti atque corrupti, quos dolores et quas molestias excepturi sint, obcaecati cupiditate non provident, similique',
                'created_at' => '08.06.2021'
            ],
            [
                'id' => 4,
                'category_id' => 1,
                'title' => 'title-4',
                'description' => 'Nemo enim ipsam voluptatem, qui blanditiis praesentium voluptatum deleniti atque corrupti, quos dolores et quas molestias excepturi sint, obcaecati cupiditate non provident, similique sunt in',
                'created_at' => '09.10.2008'
            ],
            [
                'id' => 5,
                'category_id' => 2,
                'title' => 'title-5',
                'description' => 'Quis autem vel eum iure reprehenderit, unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam eaque ipsa, sunt in culpa qui',
                'created_at' => '30.11.2021'
            ],
            [
                'id' => 6,
                'category_id' => 1,
                'title' => 'title-6',
                'description' => 'At vero eos et accusamus et iusto odio dignissimos ducimus, nam libero tempore, cum soluta nobis est eligendi optio, cumque nihil impedit, quo minus id',
                'created_at' => '31.07.2023'
            ],
            [
                'id' => 7,
                'category_id' => 3,
                'title' => 'title-7',
                'description' => 'Ut enim ad minima veniam, qui in ea voluptate velit esse, quam nihil molestiae consequatur, vel illum, ut aut reiciendis voluptatibus maiores alias consequatur aut',
                'created_at' => '03.01.2013'
            ],
            [
                'id' => 8,
                'category_id' => 2,
                'title' => 'title-8',
                'description' => 'At vero eos et accusamus et iusto odio dignissimos ducimus, quis nostrum exercitationem ullam corporis suscipit laboriosam, quae ab illo inventore veritatis et quasi architecto',
                'created_at' => '10.02.2012'
            ],
            [
                'id' => 9,
                'category_id' => 1,
                'title' => 'title-9',
                'description' => 'Sed ut perspiciatis, nam libero tempore, cum soluta nobis est eligendi optio, cumque nihil impedit, quo minus id, quod maxime placeat, qui dolorem eum fugiat',
                'created_at' => '15.12.2005'
            ],
            [
                'id' => 10,
                'category_id' => 2,
                'title' => 'title-10',
                'description' => 'Ut enim ad minima veniam, qui in ea voluptate velit esse, quam nihil molestiae consequatur, vel illum, ut aut reiciendis voluptatibus maiores alias consequatur aut',
                'created_at' => '15.12.2005'
            ],
        ];

        if(!is_null($id)) {
            foreach($news as $new) {
                if($new['id'] == $id) {
                    return $new;
                }
            }
        }

        return $news;
    }

    public function getNewsByCategory(int $id): array {
        $result = [];
        foreach ($this->getNews() as $new) {
            if($new["category_id"] == $id) {
                $result[] = $new;
            }
        };
        return $result;
    }

    public function getCategories(int $id = null): array
    {
        return [
            [
                'id' => 1,
                'name' => "Политика"
            ],
            [
                'id' => 2,
                'name' => "Экономика"
            ],
            [
                'id' => 3,
                'name' => "Спорт"
            ]
        ];
    }
}
