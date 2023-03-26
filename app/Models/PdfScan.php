<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PdfScan extends Model
{
    use HasFactory;
    protected $fillable = [
       'user_id',
       'model', 
       'form_version', 
       'date', 
       'producer', 
       'insured', 
       'contact_name', 
       'contact_phone', 
       'contact_fax', 
       'contact_email', 
       'certificate_holder', 
       'description', 
       'insurer_a_name', 
       'insurer_a_code', 
       'insurer_b_name', 
       'insurer_b_code', 
       'insurer_c_name', 
       'insurer_c_code', 
       'insurer_d_name', 
       'insurer_d_code', 
       'insurer_e_name', 
       'insurer_e_code', 
       'insurer_f_name', 
       'insurer_f_code', 
       'GL_provider', 
       'GL_commercial_gl', 
       'GL_claims_code', 
       'GL_occurrence', 
       'GL_policy', 
       'GL_project', 
       'GL_location', 
       'GL_additional_insured', 
       'GL_subrogation_waived', 
       'GL_policy_number', 
       'GL_policy_effective_date', 
       'GL_policy_expiration_date', 
       'GL_limit_for_each_occurrence', 
       'GL_limit_for_damage_to_rented_premises_on_each_occurrence', 
       'GLlimit_for_medical_expenses_of_any_one_person', 
       'GL_limit_for_personal_and_advertising_injury', 
       'GL_limit_for_general_aggregate', 
       'GL_limit_for_products', 
       'AL_provider', 
       'AL_any_auto', 
       'AL_owned_autos_only', 
       'AL_scheduled_autos', 
       'AL_hired_autos_only', 
       'AL_non_owned_autos_only', 
       'AL_additional_insured', 
       'AL_subrogation_waived', 
       'AL_policy_number', 
       'AL_policy_effective_date', 
       'AL_policy_expiration_date', 
       'AL_limit_for_combined_single_limit_on_each_accident', 
       'AL_limit_for_bodily_injury_per_person', 
       'AL_limit_for_bodily_injury_per_accident', 
       'AL_limit_for_property_damage_per_accident', 
       'UL_provider', 
       'UL_claims_made', 
       'UL_occurrence', 
       'UL_umbrella_liability', 
       'UL_excess_liability', 
       'UL_ded', 
       'UL_additional_insured', 
       'UL_subrogation_waived', 
       'UL_policy_number', 
       'UL_policy_effective_date', 
       'UL_policy_expiration_date', 
       'UL_limit_for_each_occurrence', 
       'UL_limit_for_aggregate', 
       'UL_limit_for_gl_only', 
       'WC_provider', 
       'WC_is_excluded', 
       'WC_additional_insured', 
       'WC_subrogation_waived', 
       'WC_policy_number', 
       'WC_policy_effective_date', 
       'WC_policy_expiration_date', 
       'WC_limit_per_statue', 
       'WC_limit_for_el_each_accident', 
       'WC_limit_for_el_disease_for_each_employee', 
       'WC_limit_for_el_disease_policy_limit', 
       'OL_provider', 
       'OL_coverage', 
       'OL_additional_insured', 
       'OL_subrogation_waived', 
       'OL_policy_number', 
       'OL_policy_effective_date', 
       'OL_policy_expiration_date', 
       'OL_limit_for_crime_dis', 
       'authorized_representative', 
       'is_in_focus', 
       'is_glare_free', 
       'pdf_file_name',
    ];
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function generalLiability()
    {
        return $this->hasMany(GeneralLiability::class);
    }

    public function automobileLiability()
    {
        return $this->hasMany(AutomobileLiability::class);
    }

    public function umbrellaLiability()
    {
        return $this->hasMany(UmbrellaLiability::class);
    }
    public function workersCompensation()
    {
        return $this->hasMany(WorkersCompensation::class);
    }
    public function otherLiability()
    {
        return $this->hasMany(OtherLiability::class);
    }
}
