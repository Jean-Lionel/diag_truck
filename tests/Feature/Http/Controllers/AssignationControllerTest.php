<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\Assignation;
use App\Models\Docteur;
use App\Models\Infirmier;
use App\Models\Patient;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\AssignationController
 */
class AssignationControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    /**
     * @test
     */
    public function index_displays_view(): void
    {
        $assignations = Assignation::factory()->count(3)->create();

        $response = $this->get(route('assignation.index'));

        $response->assertOk();
        $response->assertViewIs('assignation.index');
        $response->assertViewHas('assignations');
    }


    /**
     * @test
     */
    public function create_displays_view(): void
    {
        $response = $this->get(route('assignation.create'));

        $response->assertOk();
        $response->assertViewIs('assignation.create');
    }


    /**
     * @test
     */
    public function store_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\AssignationController::class,
            'store',
            \App\Http\Requests\AssignationStoreRequest::class
        );
    }

    /**
     * @test
     */
    public function store_saves_and_redirects(): void
    {
        $patient = Patient::factory()->create();
        $infirmier = Infirmier::factory()->create();
        $docteur = Docteur::factory()->create();
        $date_assignation = $this->faker->dateTime();

        $response = $this->post(route('assignation.store'), [
            'patient_id' => $patient->id,
            'infirmier_id' => $infirmier->id,
            'docteur_id' => $docteur->id,
            'date_assignation' => $date_assignation,
        ]);

        $assignations = Assignation::query()
            ->where('patient_id', $patient->id)
            ->where('infirmier_id', $infirmier->id)
            ->where('docteur_id', $docteur->id)
            ->where('date_assignation', $date_assignation)
            ->get();
        $this->assertCount(1, $assignations);
        $assignation = $assignations->first();

        $response->assertRedirect(route('assignation.index'));
        $response->assertSessionHas('assignation.id', $assignation->id);
    }


    /**
     * @test
     */
    public function show_displays_view(): void
    {
        $assignation = Assignation::factory()->create();

        $response = $this->get(route('assignation.show', $assignation));

        $response->assertOk();
        $response->assertViewIs('assignation.show');
        $response->assertViewHas('assignation');
    }


    /**
     * @test
     */
    public function edit_displays_view(): void
    {
        $assignation = Assignation::factory()->create();

        $response = $this->get(route('assignation.edit', $assignation));

        $response->assertOk();
        $response->assertViewIs('assignation.edit');
        $response->assertViewHas('assignation');
    }


    /**
     * @test
     */
    public function update_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\AssignationController::class,
            'update',
            \App\Http\Requests\AssignationUpdateRequest::class
        );
    }

    /**
     * @test
     */
    public function update_redirects(): void
    {
        $assignation = Assignation::factory()->create();
        $patient = Patient::factory()->create();
        $infirmier = Infirmier::factory()->create();
        $docteur = Docteur::factory()->create();
        $date_assignation = $this->faker->dateTime();

        $response = $this->put(route('assignation.update', $assignation), [
            'patient_id' => $patient->id,
            'infirmier_id' => $infirmier->id,
            'docteur_id' => $docteur->id,
            'date_assignation' => $date_assignation,
        ]);

        $assignation->refresh();

        $response->assertRedirect(route('assignation.index'));
        $response->assertSessionHas('assignation.id', $assignation->id);

        $this->assertEquals($patient->id, $assignation->patient_id);
        $this->assertEquals($infirmier->id, $assignation->infirmier_id);
        $this->assertEquals($docteur->id, $assignation->docteur_id);
        $this->assertEquals($date_assignation, $assignation->date_assignation);
    }


    /**
     * @test
     */
    public function destroy_deletes_and_redirects(): void
    {
        $assignation = Assignation::factory()->create();

        $response = $this->delete(route('assignation.destroy', $assignation));

        $response->assertRedirect(route('assignation.index'));

        $this->assertModelMissing($assignation);
    }
}
