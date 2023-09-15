<?php

namespace Tests\Feature\Http;

use Tests\TestCase;

class RoutingTest extends TestCase {

    public function test_news_page_returns_a_successful_response() {
        $response = $this->get('/news');
        $response->assertStatus(200);
    }

    public function test_news_categories_page_returns_a_successful_response() {
        $response = $this->get('/news-categories');
        $response->assertStatus(200);
    }

    public function test_admin_page_returns_a_successful_response() {
        $response = $this->get('/admin');
        $response->assertStatus(200);
    }

}
