<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\Diagnostic;
use App\Models\Docteur;
use App\Models\Patient;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\DiagnosticController
 */
class DiagnosticControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    /**
     * @test
     */
    public function index_displays_view(): void
    {
        $diagnostics = Diagnostic::factory()->count(3)->create();

        $response = $this->get(route('diagnostic.index'));

        $response->assertOk();
        $response->assertViewIs('diagnostic.index');
        $response->assertViewHas('diagnostics');
    }


    /**
     * @test
     */
    public function create_displays_view(): void
    {
        $response = $this->get(route('diagnostic.create'));

        $response->assertOk();
        $response->assertViewIs('diagnostic.create');
    }


    /**
     * @test
     */
    public function store_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\DiagnosticController::class,
            'store',
            \App\Http\Requests\DiagnosticStoreRequest::class
        );
    }

    /**
     * @test
     */
    public function store_saves_and_redirects(): void
    {
        $patient = Patient::factory()->create();
        $docteur = Docteur::factory()->create();
        $contenu = $this->faker->word;
        $date_diag = $this->faker->dateTime();

        $response = $this->post(route('diagnostic.store'), [
            'patient_id' => $patient->id,
            'docteur_id' => $docteur->id,
            'contenu' => $contenu,
            'date_diag' => $date_diag,
        ]);

        $diagnostics = Diagnostic::query()
            ->where('patient_id', $patient->id)
            ->where('docteur_id', $docteur->id)
            ->where('contenu', $contenu)
            ->where('date_diag', $date_diag)
            ->get();
        $this->assertCount(1, $diagnostics);
        $diagnostic = $diagnostics->first();

        $response->assertRedirect(route('diagnostic.index'));
        $response->assertSessionHas('diagnostic.id', $diagnostic->id);
    }


    /**
     * @test
     */
    public function show_displays_view(): void
    {
        $diagnostic = Diagnostic::factory()->create();

        $response = $this->get(route('diagnostic.show', $diagnostic));

        $response->assertOk();
        $response->assertViewIs('diagnostic.show');
        $response->assertViewHas('diagnostic');
    }


    /**
     * @test
     */
    public function edit_displays_view(): void
    {
        $diagnostic = Diagnostic::factory()->create();

        $response = $this->get(route('diagnostic.edit', $diagnostic));

        $response->assertOk();
        $response->assertViewIs('diagnostic.edit');
        $response->assertViewHas('diagnostic');
    }


    /**
     * @test
     */
    public function update_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\DiagnosticController::class,
            'update',
            \App\Http\Requests\DiagnosticUpdateRequest::class
        );
    }

    /**
     * @test
     */
    public function update_redirects(): void
    {
        $diagnostic = Diagnostic::factory()->create();
        $patient = Patient::factory()->create();
        $docteur = Docteur::factory()->create();
        $contenu = $this->faker->word;
        $date_diag = $this->faker->dateTime();

        $response = $this->put(route('diagnostic.update', $diagnostic), [
            'patient_id' => $patient->id,
            'docteur_id' => $docteur->id,
            'contenu' => $contenu,
            'date_diag' => $date_diag,
        ]);

        $diagnostic->refresh();

        $response->assertRedirect(route('diagnostic.index'));
        $response->assertSessionHas('diagnostic.id', $diagnostic->id);

        $this->assertEquals($patient->id, $diagnostic->patient_id);
        $this->assertEquals($docteur->id, $diagnostic->docteur_id);
        $this->assertEquals($contenu, $diagnostic->contenu);
        $this->assertEquals($date_diag, $diagnostic->date_diag);
    }


    /**
     * @test
     */
    public function destroy_deletes_and_redirects(): void
    {
        $diagnostic = Diagnostic::factory()->create();

        $response = $this->delete(route('diagnostic.destroy', $diagnostic));

        $response->assertRedirect(route('diagnostic.index'));

        $this->assertModelMissing($diagnostic);
    }
}
