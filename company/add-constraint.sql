alter table employee add constraint fk_superssn_emp foreign key (superssn) references employee (ssn) on delete cascade on update cascade;

alter table employee add constraint fk_dno_department foreign key (dno) references department (dnumber) on delete cascade on update cascade;

alter table dependent add constraint fk_essn_dependent foreign key (essn) references employee (ssn) on delete cascade on update cascade;

alter table dept_locations add constraint fk_dnumber_dloc foreign key (dnumber) references department (dnumber) on delete cascade on update cascade;

alter table project add constraint fk_dnum_project foreign key (dnum) references department (dnumber) on delete cascade on update cascade;

alter table works_on add constraint fk_essn_workson foreign key (essn) references employee (ssn) on delete cascade on update cascade;

alter table works_on add constraint fk_pno_workson foreign key (pno) references project (pnumber) on delete cascade on update cascade;