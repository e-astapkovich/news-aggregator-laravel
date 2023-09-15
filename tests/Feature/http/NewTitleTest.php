<?php

namespace Tests\Feature;

use Tests\TestCase;

class NewTitleTest extends TestCase {

    public function test_page_of_new_contains_title() {
        $response = $this->get('/news/1');
        $response->assertSeeText('title-1');
    }

}
