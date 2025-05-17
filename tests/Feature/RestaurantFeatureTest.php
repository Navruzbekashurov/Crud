<?php

namespace Tests\Feature;

use App\Models\Branch;
use App\Models\BranchPhoneNumber;
use App\Models\Restaurant;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Tests\TestCase;

class RestaurantFeatureTest extends TestCase
{
    use RefreshDatabase, WithoutMiddleware;

    public function test_toggle_active_restaurant()
    {
        $restaurant = Restaurant::factory()->create(['is_active' => true]);
        $response = $this->put("/restaurants/{$restaurant->id}/toggle-active");
        $response->assertRedirect('/restaurants');
        $restaurant->refresh();
        $this->assertFalse($restaurant->is_active);
    }

    public function test_create_branch_for_restaurant()
    {
        $restaurant = Restaurant::factory()->create();

        $branchData = [
            'restaurant_id' => $restaurant->id,
            'name' => 'Test Branch',
            'address' => 'Test Address',
            'is_active' => true
        ];
        $response = $this->post("/restaurants/{$restaurant->id}/branches", $branchData);
        $response->assertRedirect(route('restaurants.show', ['restaurant' => $restaurant->id]));
        $this->assertDatabaseHas('branches', ['name' => 'Test Branch']);
    }

    public function test_update_branch_for_restaurant()
    {
        $restaurant = Restaurant::factory()->create();
        $branch = Branch::factory()->create(['restaurant_id' => $restaurant->id]);

        $updateData = [
            'restaurant_id' => $restaurant->id,
            'name' => 'Updated Branch',
            'address' => 'Updated Address',
            'is_active' => true
        ];

        $response = $this->put("/restaurants/{$restaurant->id}/branches/{$branch->id}", $updateData);
        $response->assertRedirect("/restaurants/{$restaurant->id}");
        $this->assertDatabaseHas('branches', ['name' => 'Updated Branch']);
    }

    public function test_delete_branch_for_restaurant()
    {
        $restaurant = Restaurant::factory()->create();
        $branch = Branch::factory()->create(['restaurant_id' => $restaurant->id]);

        $response = $this->delete("/restaurants/$restaurant->id/branches/$branch->id");
        $response->assertRedirect("/restaurants/$restaurant->id");
        $this->assertDatabaseMissing('branches', ['id' => $branch->id]);
    }

    public function test_create_phone_for_branch()
    {
        $restaurant = Restaurant::factory()->create();
        $branch = Branch::factory()->create(['restaurant_id' => $restaurant->id]);

        $phoneData = [
            'branch_id' => $branch->id,
            'phone' => '1234567890',
        ];

        $response = $this->post("/restaurants/{$restaurant->id}/branches/{$branch->id}/phones", $phoneData);
        $response->assertRedirect("/restaurants/{$restaurant->id}/branches/{$branch->id}/edit");
        $this->assertDatabaseHas('branch_phone_numbers', ['phone' => '1234567890']);
    }

    public function test_update_phone_for_branch()
    {
        $restaurant = Restaurant::factory()->create();
        $branch = Branch::factory()->create(['restaurant_id' => $restaurant->id]);
        $phone = BranchPhoneNumber::factory()->create(['branch_id' => $branch->id]);

        $updateData = [
            'phone' => '0987654321',
            'branch_id' => $branch->id,
        ];

        $response = $this->put("/restaurants/{$restaurant->id}/branches/{$branch->id}/phones/{$phone->id}", $updateData);
        $response->assertRedirect("/restaurants/{$restaurant->id}/branches/{$branch->id}/edit");
        $this->assertDatabaseHas('branch_phone_numbers', ['phone' => '0987654321']);
    }

    public function test_delete_phone_for_branch()
    {
        $restaurant = Restaurant::factory()->create();
        $branch = Branch::factory()->create(['restaurant_id' => $restaurant->id]);
        $phone = BranchPhoneNumber::factory()->create(['branch_id' => $branch->id]);

        $response = $this->delete("/restaurants/{$restaurant->id}/branches/{$branch->id}/phones/{$phone->id}");
        $response->assertRedirect("/restaurants/{$restaurant->id}/branches/{$branch->id}/edit");
        $this->assertDatabaseMissing('branch_phone_numbers', ['id' => $phone->id]);
    }

    public function test_restaurant_index()
    {
        $restaurant = Restaurant::factory()->create();
        $response = $this->get('/restaurants');
        $response->assertStatus(200);
        $response->assertSee($restaurant->name);
    }

    public function test_restaurant_show()
    {
        $restaurant = Restaurant::factory()->create();
        $response = $this->get("/restaurants/{$restaurant->id}");
        $response->assertStatus(200);
        $response->assertSee($restaurant->name);
    }

    public function test_restaurant_create_form()
    {
        $response = $this->get('/restaurants/create');
        $response->assertStatus(200);
    }

    public function test_store_restaurant()
    {
        $restaurantData = [
            'name' => 'Test Restaurant',
            'phone_number' => '1234567890',
            'address' => 'Test Address',
            'is_active' => true,
        ];
        $response = $this->post('/restaurants', $restaurantData);
        $response->assertRedirect('/restaurants');
        $this->assertDatabaseHas('restaurants', ['name' => 'Test Restaurant']);
    }

    public function test_edit_restaurant_form()
    {
        $restaurant = Restaurant::factory()->create();
        $response = $this->get("/restaurants/{$restaurant->id}/edit");
        $response->assertStatus(200);
        $response->assertSee($restaurant->name);
    }

    public function test_update_restaurant()
    {
        $restaurant = Restaurant::factory()->create();
        $updateData = [
            'name' => 'Updated Restaurant',
            'phone_number' => '1112223333',
            'address' => 'Updated Address',
            'is_active' => false,
        ];
        $response = $this->put("/restaurants/{$restaurant->id}", $updateData);
        $response->assertRedirect('/restaurants');
        $this->assertDatabaseHas('restaurants', ['name' => 'Updated Restaurant']);
    }

    public function test_delete_restaurant()
    {
        $restaurant = Restaurant::factory()->create();
        $response = $this->delete("/restaurants/{$restaurant->id}");
        $response->assertRedirect('/restaurants');
        $this->assertDatabaseMissing('restaurants', ['id' => $restaurant->id]);
    }
}
