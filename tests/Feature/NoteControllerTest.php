<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Note;
use App\Models\Etudiant;
use App\Models\ElementConstitutif;
use Illuminate\Foundation\Testing\RefreshDatabase;

class NoteControllerTest extends TestCase
{
    use RefreshDatabase; // Pour démarrer chaque test avec une base de données propre.

    protected $etudiant;
    protected $ec;

    protected function setUp(): void
    {
        parent::setUp();

        // Créer des données de base pour les tests
        $this->etudiant = Etudiant::factory()->create();
        $this->ec = ElementConstitutif::factory()->create();
        $this->uniteEnseignement = UniteEnseignement::factory()->create();

    }
    public function test_index_shows_notes()
{
    // Créer une note pour le test
    Note::factory()->create([
        'etudiant_id' => $this->etudiant->id,
        'ec_id' => $this->ec->id,
        'note' => 15,
    ]);

    // Envoyer une requête GET à la route d'affichage des notes
    $response = $this->get(route('notes.index'));

    // Vérifier que la réponse est OK et contient la note
    $response->assertStatus(200);
    $response->assertSee($this->etudiant->nom);
    $response->assertSee('15');
}
public function test_store_creates_a_note()
{
    // Simuler les données d'une note
    $data = [
        'etudiant_id' => $this->etudiant->id,
        'ec_id' => $this->ec->id,
        'note' => 18.5,
    ];

    // Envoyer une requête POST pour créer la note
    $response = $this->post(route('notes.store'), $data);

    // Vérifier que la note a été ajoutée à la base de données
    $this->assertDatabaseHas('notes', $data);

    // Vérifier la redirection et le message de succès
    $response->assertRedirect(route('notes.index'));
    $response->assertSessionHas('success', 'Note ajoutée avec succès.');
}
public function test_update_modifies_a_note()
{
    // Créer une note existante
    $note = Note::factory()->create([
        'etudiant_id' => $this->etudiant->id,
        'ec_id' => $this->ec->id,
        'note' => 12,
    ]);

    // Nouvelles données pour la modification
    $updatedData = [
        'note' => 16.5,
    ];

    // Envoyer une requête PUT pour modifier la note
    $response = $this->put(route('notes.update', $note->id), $updatedData);

    // Vérifier que la base de données a été mise à jour
    $this->assertDatabaseHas('notes', array_merge(['id' => $note->id], $updatedData));

    // Vérifier la redirection et le message de succès
    $response->assertRedirect(route('notes.index'));
    $response->assertSessionHas('success', 'Note mise à jour avec succès.');
}
public function test_destroy_deletes_a_note()
{
    // Créer une note existante
    $note = Note::factory()->create([
        'etudiant_id' => $this->etudiant->id,
        'ec_id' => $this->ec->id,
        'note' => 14,
    ]);

    // Envoyer une requête DELETE pour supprimer la note
    $response = $this->delete(route('notes.destroy', $note->id));

    // Vérifier que la note a été supprimée de la base de données
    $this->assertDatabaseMissing('notes', ['id' => $note->id]);

    // Vérifier la redirection et le message de succès
    $response->assertRedirect(route('notes.index'));
    $response->assertSessionHas('success', 'Note supprimée avec succès.');
}
public function test_store_validates_input()
{
    // Envoyer une requête POST avec des données invalides
    $response = $this->post(route('notes.store'), []);

    // Vérifier que des erreurs de validation sont retournées
    $response->assertSessionHasErrors(['etudiant_id', 'ec_id', 'note']);
}

}

