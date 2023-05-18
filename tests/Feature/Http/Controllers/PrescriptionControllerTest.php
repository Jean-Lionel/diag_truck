<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\Diag;
use App\Models\Med;
use App\Models\Prescription;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\PrescriptionController
 */
class PrescriptionControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    /**
     * @test
     */
    public function index_displays_view(): void
    {
        $prescriptions = Prescription::factory()->count(3)->create();

        $response = $this->get(route('prescription.index'));

        $response->assertOk();
        $response->assertViewIs('prescription.index');
        $response->assertViewHas('prescriptions');
    }


    /**
     * @test
     */
    public function create_displays_view(): void
    {
        $response = $this->get(route('prescription.create'));

        $response->assertOk();
        $response->assertViewIs('prescription.create');
    }


    /**
     * @test
     */
    public function store_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\PrescriptionController::class,
            'store',
            \App\Http\Requests\PrescriptionStoreRequest::class
        );
    }

    /**
     * @test
     */
    public function store_saves_and_redirects(): void
    {
        $diag = Diag::factory()->create();
        $med = Med::factory()->create();
        $dose = $this->faker->word;

        $response = $this->post(route('prescription.store'), [
            'diag_id' => $diag->id,
            'med_id' => $med->id,
            'dose' => $dose,
        ]);

        $prescriptions = Prescription::query()
            ->where('diag_id', $diag->id)
            ->where('med_id', $med->id)
            ->where('dose', $dose)
            ->get();
        $this->assertCount(1, $prescriptions);
        $prescription = $prescriptions->first();

        $response->assertRedirect(route('prescription.index'));
        $response->assertSessionHas('prescription.id', $prescription->id);
    }


    /**
     * @test
     */
    public function show_displays_view(): void
    {
        $prescription = Prescription::factory()->create();

        $response = $this->get(route('prescription.show', $prescription));

        $response->assertOk();
        $response->assertViewIs('prescription.show');
        $response->assertViewHas('prescription');
    }


    /**
     * @test
     */
    public function edit_displays_view(): void
    {
        $prescription = Prescription::factory()->create();

        $response = $this->get(route('prescription.edit', $prescription));

        $response->assertOk();
        $response->assertViewIs('prescription.edit');
        $response->assertViewHas('prescription');
    }


    /**
     * @test
     */
    public function update_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\PrescriptionController::class,
            'update',
            \App\Http\Requests\PrescriptionUpdateRequest::class
        );
    }

    /**
     * @test
     */
    public function update_redirects(): void
    {
        $prescription = Prescription::factory()->create();
        $diag = Diag::factory()->create();
        $med = Med::factory()->create();
        $dose = $this->faker->word;

        $response = $this->put(route('prescription.update', $prescription), [
            'diag_id' => $diag->id,
            'med_id' => $med->id,
            'dose' => $dose,
        ]);

        $prescription->refresh();

        $response->assertRedirect(route('prescription.index'));
        $response->assertSessionHas('prescription.id', $prescription->id);

        $this->assertEquals($diag->id, $prescription->diag_id);
        $this->assertEquals($med->id, $prescription->med_id);
        $this->assertEquals($dose, $prescription->dose);
    }


    /**
     * @test
     */
    public function destroy_deletes_and_redirects(): void
    {
        $prescription = Prescription::factory()->create();

        $response = $this->delete(route('prescription.destroy', $prescription));

        $response->assertRedirect(route('prescription.index'));

        $this->assertModelMissing($prescription);
    }
}
