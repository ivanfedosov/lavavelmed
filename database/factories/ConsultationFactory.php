<?php


namespace Database\Factories;

use App\Models\Consultation;
use App\Models\Doctor;
use App\Models\Patient;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class ConsultationFactory extends Factory
{
    protected $model = Consultation::class;

    /**
     * @throws \Exception
     */
    public function definition(): array
    {
        $randomNumber = random_int(1, 4);

        return [
            'patient_id' => Patient::findOrFail($randomNumber)->getAttribute('id'),
            'doctor_id' => Doctor::findOrFail($randomNumber)->getAttribute('id'),
            'title' => $this->faker->colorName,
            'date' => Carbon::now(),
        ];
    }

}
