

CREATE TABLE student_auth (
    prn VARCHAR(12) PRIMARY KEY,
    password TEXT NOT NULL,
    payment_done BIT(1) DEFAULT 0,
    antiragging_uploaded BIT(1) DEFAULT 0
);

CREATE INDEX idx_student_auth_prn ON student_auth(prn);


CREATE TABLE student_data (
    application_id VARCHAR(12) PRIMARY KEY,
    prn VARCHAR(12) NOT NULL,
    name TEXT NOT NULL,
    category VARCHAR(100) NOT NULL,
    gender VARCHAR(50) NOT NULL,
    fathers_name TEXT NOT NULL,
    mothers_name TEXT NOT NULL,
    date_of_birth DATE NOT NULL,
    region VARCHAR(50) NOT NULL,
    mother_tongue VARCHAR(100) NOT NULL,
    annual_income_start INT NOT NULL,
    annual_income_end INT NOT NULL,
    mobile_number VARCHAR(10) NOT NULL,
    email_address TEXT NOT NULL,
    physically_handicapped BIT(1) NOT NULL,
    linguistic_minority BIT(1) NOT NULL,
    religious_minority BIT(1) NOT NULL,
    course_name TEXT NOT NULL,
    admission_date DATE NOT NULL,
    FOREIGN KEY(prn) REFERENCES student_auth(prn)
);

CREATE INDEX idx_student_data_app_id ON student_data(application_id);

CREATE INDEX idx_student_data_prn ON student_data(prn);


CREATE TABLE student_previous_records (
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    prn VARCHAR(12) NOT NULL, 
    scc_board TEXT NOT NULL,
    ssc_passing_year YEAR(4),
    ssc_total_percentage DOUBLE NOT NULL,
    qalifying_exam TEXT DEFAULT NULL,
    hsc_board TEXT DEFAULT NULL,
    hsc_passing_year YEAR(4),
    physics_percentage DOUBLE DEFAULT NULL,
    chemistry_percentage DOUBLE DEFAULT NULL,
    math_percentage DOUBLE DEFAULT NULL,
    hsc_total_percentage DOUBLE DEFAULT NULL,
    eligibility_percentage DOUBLE DEFAULT NULL,
    cet_percentile DOUBLE DEFAULT NULL,
    jee_percentile DOUBLE DEFAULT NULL,
    merit_no BIGINT DEFAULT NULL,
    merit_marks DOUBLE DEFAULT NULL,
    FOREIGN KEY (prn) REFERENCES student_auth(prn) 
);


CREATE TABLE address(
    id int AUTO_INCREMENT PRIMARY KEY,
    prn VARCHAR(12) NOT NULL,
    line_1 text NOT NULL,
    line_2 text NOT NULL,
    line_3 text DEFAULT NULL,
    state VARCHAR(100) NOT NULL,
    district VARCHAR(100) NOT NULL,
    village VARCHAR(100) NOT NULL,
    pincode int NOT NULL,
    FOREIGN KEY (prn) REFERENCES student_auth(prn)
);

