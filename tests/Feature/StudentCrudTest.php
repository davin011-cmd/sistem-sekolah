<?php

use App\Models\Student;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

function studentAttributes(array $overrides = []): array
{
    return array_merge([
        'nis' => '1234',
        'name' => 'Ayu Lestari',
        'gender' => 'Perempuan',
        'major' => 'AKL',
        'class' => 'X AKL 1',
    ], $overrides);
}

it('lists students and displays their detail and edit forms', function () {
    $student = Student::query()->create(studentAttributes());

    $this->get(route('students.index'))
        ->assertSuccessful()
        ->assertSee('Ayu Lestari')
        ->assertSee('1234');

    $this->get(route('students.show', $student))
        ->assertSuccessful()
        ->assertSee('X AKL 1');

    $this->get(route('students.edit', $student))
        ->assertSuccessful()
        ->assertSee('value="Ayu Lestari"', false);
});

it('creates a student with valid data', function () {
    $this->post(route('students.store'), studentAttributes())
        ->assertRedirect(route('students.index'));

    $this->assertDatabaseHas('students', [
        'nis' => '1234',
        'name' => 'Ayu Lestari',
    ]);
});

it('requires unique valid student data when creating a student', function () {
    Student::query()->create(studentAttributes());

    $this->from(route('students.create'))
        ->post(route('students.store'), studentAttributes())
        ->assertRedirect(route('students.create'))
        ->assertSessionHasErrors('nis');

    $this->assertDatabaseCount('students', 1);
});

it('updates a student while keeping their current NIS', function () {
    $student = Student::query()->create(studentAttributes());

    $this->put(route('students.update', $student), studentAttributes([
        'name' => 'Ayu Lestari Putri',
        'class' => 'XI AKL 1',
    ]))
        ->assertRedirect(route('students.index'));

    $this->assertDatabaseHas('students', [
        'id' => $student->id,
        'nis' => '1234',
        'name' => 'Ayu Lestari Putri',
        'class' => 'XI AKL 1',
    ]);
});

it('deletes a student', function () {
    $student = Student::query()->create(studentAttributes());

    $this->delete(route('students.destroy', $student))
        ->assertRedirect(route('students.index'));

    $this->assertDatabaseMissing('students', ['id' => $student->id]);
});
