<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\Patient;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\PatientController
 */
class PatientControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    /**
     * @test
     */
    public function index_displays_view(): void
    {
        $patients = Patient::factory()->count(3)->create();

        $response = $this->get(route('patient.index'));

        $response->assertOk();
        $response->assertViewIs('patient.index');
        $response->assertViewHas('patients');
    }


    /**
     * @test
     */
    public function create_displays_view(): void
    {
        $response = $this->get(route('patient.create'));

        $response->assertOk();
        $response->assertViewIs('patient.create');
    }


    /**
     * @test
     */
    public function store_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\PatientController::class,
            'store',
            \App\Http\Requests\PatientStoreRequest::class
        );
    }

    /**
     * @test
     */
    public function store_saves_and_redirects(): void
    {
        $first_name = $this->faker->firstName;
        $last_name = $this->faker->lastName;
        $birthday = $this->faker->dateTime();
        $patient_id = $this->faker->word;

        $response = $this->post(route('patient.store'), [
            'first_name' => $first_name,
            'last_name' => $last_name,
            'birthday' => $birthday,
            'patient_id' => $patient_id,
        ]);

        $patients = Patient::query()
            ->where('first_name', $first_name)
            ->where('last_name', $last_name)
            ->where('birthday', $birthday)
            ->where('patient_id', $patient_id)
            ->get();
        $this->assertCount(1, $patients);
        $patient = $patients->first();

        $response->assertRedirect(route('patient.index'));
        $response->assertSessionHas('patient.id', $patient->id);
    }


    /**
     * @test
     */
    public function show_displays_view(): void
    {
        $patient = Patient::factory()->create();

        $response = $this->get(route('patient.show', $patient));

        $response->assertOk();
        $response->assertViewIs('patient.show');
        $response->assertViewHas('patient');
    }


    /**
     * @test
     */
    public function edit_displays_view(): void
    {
        $patient = Patient::factory()->create();

        $response = $this->get(route('patient.edit', $patient));

        $response->assertOk();
        $response->assertViewIs('patient.edit');
        $response->assertViewHas('patient');
    }


    /**
     * @test
     */
    public function update_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\PatientController::class,
            'update',
            \App\Http\Requests\PatientUpdateRequest::class
        );
    }

    /**
     * @test
     */
    public function update_redirects(): void
    {
        $patient = Patient::factory()->create();
        $first_name = $this->faker->firstName;
        $last_name = $this->faker->lastName;
        $birthday = $this->faker->dateTime();
        $patient_id = $this->faker->word;

        $response = $this->put(route('patient.update', $patient), [
            'first_name' => $first_name,
            'last_name' => $last_name,
            'birthday' => $birthday,
            'patient_id' => $patient_id,
        ]);

        $patient->refresh();

        $response->assertRedirect(route('patient.index'));
        $response->assertSessionHas('patient.id', $patient->id);

        $this->assertEquals($first_name, $patient->first_name);
        $this->assertEquals($last_name, $patient->last_name);
        $this->assertEquals($birthday, $patient->birthday);
        $this->assertEquals($patient_id, $patient->patient_id);
    }


    /**
     * @test
     */
    public function destroy_deletes_and_redirects(): void
    {
        $patient = Patient::factory()->create();

        $response = $this->delete(route('patient.destroy', $patient));

        $response->assertRedirect(route('patient.index'));

        $this->assertModelMissing($patient);
    }
}
