select p.* from professionals p inner join pros_specs ps on p.ID = ps.ProfessionalID
	inner join specializations s on ps.SpecializationID = s.ID
    where ps.specializationID = 26
    group by p.ID