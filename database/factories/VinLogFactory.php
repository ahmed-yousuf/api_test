<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\VinLog>
 */
class VinLogFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'vin' => strtoupper($this->faker->regexify('[A-Z0-9]{17}')),
            'response' => json_encode([
                'code' => 'ct-200',
                'message' => 'ok',
                'success' => true,
                'response' => [
                    'id' => $this->faker->randomNumber(8),
                    'ref' => 'VPE-' . $this->faker->randomNumber(8),
                    'date' => now()->format('d/m/Y'),
                    'trim' => '1.8L Full',
                    'year' => $this->faker->year(),
                    'model' => 'Corolla',
                    'lower_limit' => $this->faker->numberBetween(20000, 25000),
                    'upper_limit' => $this->faker->numberBetween(25001, 30000),
                    'manufacturer' => 'Toyota',
                    'specifications' => [
                        'axel' => '2',
                        'drive' => 'FWD',
                        'liter' => '1.8',
                        'width' => '1760',
                        'height' => '1460',
                        'length' => '4540',
                        'weight' => '1450',
                        'body_type' => 'Sedan',
                        'fuel_type' => 'Dial',
                        'top_speed' => '195',
                        'wheelbase' => '2600',
                        'engine_type' => 'Gasoline',
                        'acceleration' => '11',
                        'engine_power' => '134',
                        'gearbox_type' => 'Automatic',
                        'power_torque' => '175',
                        'vehicle_type' => 'Car',
                        'fuel_capacity' => '50',
                        'engine_turbine' => null,
                        'trunk_capacity' => '348',
                        'engine_cylinder' => '4 Cylinders',
                        'number_of_doors' => 4,
                        'number_of_gears' => null,
                        'fuel_consumption' => '15',
                        'number_of_passengers' => '5',
                    ],
                    'evaluated_price' => $this->faker->numberBetween(20000, 30000),
                    'safety_features' => [
                        'airbags' => 'yes',
                        'seatbelt' => 'yes',
                        'parking_sensors' => 'yes',
                        'anti_lock_brakes' => 'yes',
                        'heads_up_display' => 'no',
                        'rear_view_camera' => 'yes',
                        'traction_control' => 'no',
                        'anti_theft_device' => 'yes',
                        'driver_monitoring' => 'no',
                        'blind_spot_warning' => 'no',
                        'adaptive_headlights' => 'no',
                        'lane_keeping_assist' => 'no',
                        'pedestrian_detection' => 'no',
                        'tire_pressure_monitor' => 'no',
                        'daytime_running_lights' => 'no',
                        'dynamic_turning_lights' => 'no',
                        'lane_departure_warning' => 'no',
                        'adaptive_cruise_control' => 'no',
                        'forward_collision_warning' => 'no',
                        'electronic_stability_control' => 'yes',
                    ],
                    'reliability_index_score' => '95',
                ],
            ]),
        ];
    }
}
