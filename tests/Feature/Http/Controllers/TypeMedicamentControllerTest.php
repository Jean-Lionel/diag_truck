<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\TypeMedicament;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\TypeMedicamentController
 */
class TypeMedicamentControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    /**
     * @test
     */
    public function index_displays_view(): void
    {
        $typeMedicaments = TypeMedicament::factory()->count(3)->create();

        $response = $this->get(route('type-medicament.index'));

        $response->assertOk();
        $response->assertViewIs('typeMedicament.index');
        $response->assertViewHas('typeMedicaments');
    }


    /**
     * @test
     */
    public function create_displays_view(): void
    {
        $response = $this->get(route('type-medicament.create'));

        $response->assertOk();
        $response->assertViewIs('typeMedicament.create');
    }


    /**
     * @test
     */
    public function store_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\TypeMedicamentController::class,
            'store',
            \App\Http\Requests\TypeMedicamentStoreRequest::class
        );
    }

    /**
     * @test
     */
    public function store_saves_and_redirects(): void
    {
        $name = $this->faker->name;

        $response = $this->post(route('type-medicament.store'), [
            'name' => $name,
        ]);

        $typeMedicaments = TypeMedicament::query()
            ->where('name', $name)
            ->get();
        $this->assertCount(1, $typeMedicaments);
        $typeMedicament = $typeMedicaments->first();

        $response->assertRedirect(route('typeMedicament.index'));
        $response->assertSessionHas('typeMedicament.id', $typeMedicament->id);
    }


    /**
     * @test
     */
    public function show_displays_view(): void
    {
        $typeMedicament = TypeMedicament::factory()->create();

        $response = $this->get(route('type-medicament.show', $typeMedicament));

        $response->assertOk();
        $response->assertViewIs('typeMedicament.show');
        $response->assertViewHas('typeMedicament');
    }


    /**
     * @test
     */
    public function edit_displays_view(): void
    {
        $typeMedicament = TypeMedicament::factory()->create();

        $response = $this->get(route('type-medicament.edit', $typeMedicament));

        $response->assertOk();
        $response->assertViewIs('typeMedicament.edit');
        $response->assertViewHas('typeMedicament');
    }


    /**
     * @test
     */
    public function update_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\TypeMedicamentController::class,
            'update',
            \App\Http\Requests\TypeMedicamentUpdateRequest::class
        );
    }

    /**
     * @test
     */
    public function update_redirects(): void
    {
        $typeMedicament = TypeMedicament::factory()->create();
        $name = $this->faker->name;

        $response = $this->put(route('type-medicament.update', $typeMedicament), [
            'name' => $name,
        ]);

        $typeMedicament->refresh();

        $response->assertRedirect(route('typeMedicament.index'));
        $response->assertSessionHas('typeMedicament.id', $typeMedicament->id);

        $this->assertEquals($name, $typeMedicament->name);
    }


    /**
     * @test
     */
    public function destroy_deletes_and_redirects(): void
    {
        $typeMedicament = TypeMedicament::factory()->create();

        $response = $this->delete(route('type-medicament.destroy', $typeMedicament));

        $response->assertRedirect(route('typeMedicament.index'));

        $this->assertModelMissing($typeMedicament);
    }
}
