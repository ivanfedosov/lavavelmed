<?php

// @formatter:off
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Models{
/**
 * App\Models\Bmi
 *
 * @property int $id
 * @property float $min
 * @property float $max
 * @property bool $is_diabetic
 * @property string $title
 * @property string $text
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Database\Factories\BmiFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Bmi newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Bmi newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Bmi query()
 * @method static \Illuminate\Database\Eloquent\Builder|Bmi whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Bmi whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Bmi whereIsDiabetic($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Bmi whereMax($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Bmi whereMin($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Bmi whereText($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Bmi whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Bmi whereUpdatedAt($value)
 */
	class Bmi extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Category
 *
 * @property int $id
 * @property string $title
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property int|null $patient_id
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Research[] $research
 * @property-read int|null $research_count
 * @method static \Illuminate\Database\Eloquent\Builder|Category newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Category newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Category query()
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Category wherePatientId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereUpdatedAt($value)
 */
	class Category extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\City
 *
 * @property int $id
 * @property string $name
 * @property string $description
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Doctor[] $hospitals
 * @property-read int|null $hospitals_count
 * @method static \Illuminate\Database\Eloquent\Builder|City newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|City newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|City query()
 * @method static \Illuminate\Database\Eloquent\Builder|City whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|City whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|City whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|City whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|City whereUpdatedAt($value)
 */
	class City extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Code
 *
 * @property int $id
 * @property string $phone
 * @property int $value
 * @property \Illuminate\Support\Carbon|null $created_at
 * @method static \Illuminate\Database\Eloquent\Builder|Code newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Code newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Code query()
 * @method static \Illuminate\Database\Eloquent\Builder|Code whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Code whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Code wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Code whereValue($value)
 */
	class Code extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Consultation
 *
 * @property int $id
 * @property int|null $patient_id
 * @property int $doctor_id
 * @property string $title
 * @property string $date
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Doctor $doctor
 * @property-read \App\Models\Patient|null $patient
 * @method static \Illuminate\Database\Eloquent\Builder|Consultation newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Consultation newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Consultation query()
 * @method static \Illuminate\Database\Eloquent\Builder|Consultation whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Consultation whereDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Consultation whereDoctorId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Consultation whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Consultation wherePatientId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Consultation whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Consultation whereUpdatedAt($value)
 */
	class Consultation extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Doctor
 *
 * @property int $id
 * @property int $user_id
 * @property bool $is_activated
 * @property string|null $qualification
 * @property string|null $job
 * @property int|null $experience
 * @property string|null $link_facebook
 * @property string|null $link_twitter
 * @property string|null $link_instagram
 * @property string|null $link_prodoctorov
 * @property int|null $specialisation_id
 * @property int|null $hospital_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property bool|null $is_profile_filled
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Consultation[] $consultations
 * @property-read int|null $consultations_count
 * @property-read \App\Models\Hospital|null $hospital
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Patient[] $patients
 * @property-read int|null $patients_count
 * @property-read \App\Models\Specialisation|null $specialisation
 * @property-read \App\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|Doctor newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Doctor newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Doctor query()
 * @method static \Illuminate\Database\Eloquent\Builder|Doctor whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Doctor whereExperience($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Doctor whereHospitalId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Doctor whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Doctor whereIsActivated($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Doctor whereIsProfileFilled($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Doctor whereJob($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Doctor whereLinkFacebook($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Doctor whereLinkInstagram($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Doctor whereLinkProdoctorov($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Doctor whereLinkTwitter($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Doctor whereQualification($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Doctor whereSpecialisationId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Doctor whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Doctor whereUserId($value)
 */
	class Doctor extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Drug
 *
 * @property int $id
 * @property int $patient_id
 * @property string $title
 * @property string $dosage
 * @property int $frequency
 * @property string $timers
 * @property int $planned
 * @property \Illuminate\Support\Carbon $start_date
 * @property \Illuminate\Support\Carbon $end_date
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Medication[] $medications
 * @property-read int|null $medications_count
 * @property-read \App\Models\Patient $patient
 * @property-read \App\Models\Specialisation|null $specialisation
 * @method static \Database\Factories\DrugFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Drug newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Drug newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Drug query()
 * @method static \Illuminate\Database\Eloquent\Builder|Drug whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Drug whereDosage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Drug whereEndDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Drug whereFrequency($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Drug whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Drug wherePatientId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Drug wherePlanned($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Drug whereStartDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Drug whereTimers($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Drug whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Drug whereUpdatedAt($value)
 */
	class Drug extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Hospital
 *
 * @property int $id
 * @property string $name
 * @property string $description
 * @property int $city_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\City $city
 * @property-read \App\Models\Doctor|null $doctor
 * @method static \Illuminate\Database\Eloquent\Builder|Hospital newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Hospital newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Hospital query()
 * @method static \Illuminate\Database\Eloquent\Builder|Hospital whereCityId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Hospital whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Hospital whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Hospital whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Hospital whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Hospital whereUpdatedAt($value)
 */
	class Hospital extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Medication
 *
 * @property int $id
 * @property int $patient_id
 * @property int $drug_id
 * @property string $notification_id
 * @property \Illuminate\Support\Carbon $date
 * @property int $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $time
 * @property-read \App\Models\Drug $drug
 * @property-read \App\Models\Patient $patient
 * @method static \Illuminate\Database\Eloquent\Builder|Medication newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Medication newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Medication query()
 * @method static \Illuminate\Database\Eloquent\Builder|Medication whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Medication whereDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Medication whereDrugId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Medication whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Medication whereNotificationId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Medication wherePatientId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Medication whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Medication whereTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Medication whereUpdatedAt($value)
 */
	class Medication extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Monitoring
 *
 * @property int $id
 * @property int $patient_id
 * @property float $value
 * @property int $type
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $date
 * @property-read \App\Models\Patient $patient
 * @method static \Illuminate\Database\Eloquent\Builder|Monitoring newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Monitoring newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Monitoring query()
 * @method static \Illuminate\Database\Eloquent\Builder|Monitoring whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Monitoring whereDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Monitoring whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Monitoring wherePatientId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Monitoring whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Monitoring whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Monitoring whereValue($value)
 */
	class Monitoring extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\News
 *
 * @property int $id
 * @property string $title_ru
 * @property string $title_en
 * @property string $text_ru
 * @property string $text_en
 * @property bool $active
 * @property int $type
 * @property int $start_day
 * @property int $end_day
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $preview_ru
 * @property string|null $preview_en
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\User[] $likedUsers
 * @property-read int|null $liked_users_count
 * @property-read \Spatie\MediaLibrary\MediaCollections\Models\Collections\MediaCollection|\Spatie\MediaLibrary\MediaCollections\Models\Media[] $media
 * @property-read int|null $media_count
 * @method static \Illuminate\Database\Eloquent\Builder|News newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|News newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|News query()
 * @method static \Illuminate\Database\Eloquent\Builder|News whereActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|News whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|News whereEndDay($value)
 * @method static \Illuminate\Database\Eloquent\Builder|News whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|News wherePreviewEn($value)
 * @method static \Illuminate\Database\Eloquent\Builder|News wherePreviewRu($value)
 * @method static \Illuminate\Database\Eloquent\Builder|News whereStartDay($value)
 * @method static \Illuminate\Database\Eloquent\Builder|News whereTextEn($value)
 * @method static \Illuminate\Database\Eloquent\Builder|News whereTextRu($value)
 * @method static \Illuminate\Database\Eloquent\Builder|News whereTitleEn($value)
 * @method static \Illuminate\Database\Eloquent\Builder|News whereTitleRu($value)
 * @method static \Illuminate\Database\Eloquent\Builder|News whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|News whereUpdatedAt($value)
 */
	class News extends \Eloquent implements \Spatie\MediaLibrary\HasMedia {}
}

namespace App\Models{
/**
 * App\Models\OnesignalPlayer
 *
 * @property int $id
 * @property int $patient_id
 * @property string $player_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Patient $patient
 * @method static \Illuminate\Database\Eloquent\Builder|OnesignalPlayer newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|OnesignalPlayer newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|OnesignalPlayer query()
 * @method static \Illuminate\Database\Eloquent\Builder|OnesignalPlayer whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OnesignalPlayer whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OnesignalPlayer wherePatientId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OnesignalPlayer wherePlayerId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OnesignalPlayer whereUpdatedAt($value)
 */
	class OnesignalPlayer extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Operation
 *
 * @property int $id
 * @property int $patient_id
 * @property int $doctor_id
 * @property \Illuminate\Support\Carbon $operation_date
 * @property int $operation_type
 * @property int $operation_weight
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Doctor $doctor
 * @property-read \App\Models\Patient $patient
 * @method static \Illuminate\Database\Eloquent\Builder|Operation newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Operation newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Operation query()
 * @method static \Illuminate\Database\Eloquent\Builder|Operation whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Operation whereDoctorId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Operation whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Operation whereOperationDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Operation whereOperationType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Operation whereOperationWeight($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Operation wherePatientId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Operation whereUpdatedAt($value)
 */
	class Operation extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Patient
 *
 * @property int $id
 * @property int $user_id
 * @property int|null $doctor_id
 * @property bool|null $is_diabetic
 * @property bool|null $is_profile_filled
 * @property int|null $max_weight
 * @property int|null $gender
 * @property \Illuminate\Support\Carbon|null $birth_date
 * @property int|null $height
 * @property \Illuminate\Support\Carbon|null $hospitalisation_date
 * @property \Illuminate\Support\Carbon|null $leaving_date
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $bmi
 * @property int|null $weight
 * @property \Illuminate\Support\Carbon|null $operation_date
 * @property int|null $operation_type
 * @property int $approve_status
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Consultation[] $consultations
 * @property-read int|null $consultations_count
 * @property-read \App\Models\Doctor|null $doctor
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Drug[] $drugs
 * @property-read int|null $drugs_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Medication[] $medication
 * @property-read int|null $medication_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Monitoring[] $monitoring
 * @property-read int|null $monitoring_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\OnesignalPlayer[] $onesignalPlayers
 * @property-read int|null $onesignal_players_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Operation[] $operations
 * @property-read int|null $operations_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Category[] $researchCategories
 * @property-read int|null $research_categories_count
 * @property-read \App\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|Patient newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Patient newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Patient query()
 * @method static \Illuminate\Database\Eloquent\Builder|Patient whereApproveStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Patient whereBirthDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Patient whereBmi($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Patient whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Patient whereDoctorId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Patient whereGender($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Patient whereHeight($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Patient whereHospitalisationDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Patient whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Patient whereIsDiabetic($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Patient whereIsProfileFilled($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Patient whereLeavingDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Patient whereMaxWeight($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Patient whereOperationDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Patient whereOperationType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Patient whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Patient whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Patient whereWeight($value)
 */
	class Patient extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Research
 *
 * @property int $id
 * @property string|null $title
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property int|null $category_id
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Category[] $category
 * @property-read int|null $category_count
 * @property-read \Spatie\MediaLibrary\MediaCollections\Models\Collections\MediaCollection|\Spatie\MediaLibrary\MediaCollections\Models\Media[] $media
 * @property-read int|null $media_count
 * @property-read \App\Models\Patient $patient
 * @method static \Illuminate\Database\Eloquent\Builder|Research newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Research newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Research query()
 * @method static \Illuminate\Database\Eloquent\Builder|Research whereCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Research whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Research whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Research whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Research whereUpdatedAt($value)
 */
	class Research extends \Eloquent implements \Spatie\MediaLibrary\HasMedia {}
}

namespace App\Models{
/**
 * App\Models\Specialisation
 *
 * @property int $id
 * @property string $name
 * @property string $description
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Doctor $doctor
 * @method static \Illuminate\Database\Eloquent\Builder|Specialisation newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Specialisation newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Specialisation query()
 * @method static \Illuminate\Database\Eloquent\Builder|Specialisation whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Specialisation whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Specialisation whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Specialisation whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Specialisation whereUpdatedAt($value)
 */
	class Specialisation extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\User
 *
 * @property int $id
 * @property int $account_type
 * @property string|null $full_name
 * @property string $phone
 * @property string|null $email
 * @property string|null $password
 * @property bool $is_banned
 * @property string|null $lang
 * @property string|null $timezone
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $first_name
 * @property string|null $second_name
 * @property string|null $last_name
 * @property-read \App\Models\Doctor|null $doctor
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\News[] $favoriteNews
 * @property-read int|null $favorite_news_count
 * @property-read \Illuminate\Database\Eloquent\Relations\HasMany $bmi
 * @property-read \Spatie\MediaLibrary\MediaCollections\Models\Collections\MediaCollection|\Spatie\MediaLibrary\MediaCollections\Models\Media[] $media
 * @property-read int|null $media_count
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read int|null $notifications_count
 * @property-read \App\Models\Patient|null $patient
 * @property-read \Illuminate\Database\Eloquent\Collection|\Laravel\Sanctum\PersonalAccessToken[] $tokens
 * @property-read int|null $tokens_count
 * @method static \Database\Factories\UserFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User query()
 * @method static \Illuminate\Database\Eloquent\Builder|User whereAccountType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereFirstName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereFullName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereIsBanned($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereLang($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereLastName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereSecondName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereTimezone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUpdatedAt($value)
 */
	class User extends \Eloquent implements \Spatie\MediaLibrary\HasMedia {}
}

