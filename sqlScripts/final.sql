CREATE TABLE student_auth (
    prn VARCHAR(12) PRIMARY KEY,
    password TEXT NOT NULL,
    payment_done BIT(1) DEFAULT 0,
    antiragging_uploaded BIT(1) DEFAULT 0,
    fee_category_approved BIT(1) DEFAULT 0,
    antiragging_file_path TEXT
);

CREATE TABLE superuser (
    email VARCHAR(100) PRIMARY KEY,
    name VARCHAR(100) DEFAULT NULL,
    password TEXT NOT NULL
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
    religion VARCHAR(100) NOT NULL,
    region VARCHAR(50) NOT NULL,
    mother_tongue VARCHAR(100) NOT NULL,
    annual_income_start INT NOT NULL,
    annual_income_end INT NOT NULL,

    line_1 text NOT NULL,
    line_2 text NOT NULL,
    line_3 text DEFAULT NULL,
    state VARCHAR(100) NOT NULL,
    district VARCHAR(100) NOT NULL,
    taluka VARCHAR(100) NOT NULL,
    village VARCHAR(100) NOT NULL,
    pincode int NOT NULL,

    mobile_number VARCHAR(10) NOT NULL,
    email_address TEXT NOT NULL,
    physically_handicapped BIT(1) NOT NULL,
    linguistic_minority BIT(1) NOT NULL,
    religious_minority BIT(1) NOT NULL,

    ssc_board TEXT NOT NULL,
    ssc_passing_year YEAR(4),
    ssc_total_percentage DOUBLE NOT NULL,
    qualifying_exam TEXT DEFAULT NULL,
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

    course_name TEXT NOT NULL,
    admission_date DATE NOT NULL,

    -- the engineering year (SE, TE, BE) the user is taking admission for
    year_of_engineering VARCHAR(2) DEFAULT NULL,

    -- we currently have three divisions in our college A, B and SS
    division VARCHAR(2) DEFAULT NULL,

    -- this column states the calendar year the student is taking admission in
    -- for example, if I am in FE and taking an admission to SE for the year 2021-22
    -- the values of this column will be 2021
    admission_calendar_year YEAR(4) DEFAULT NULL,

    -- which fee paying category the student belongs to
    -- this might be different than the student's caste hence
    -- we have to make a separate column
    fee_paying_category VARCHAR(100),

    FOREIGN KEY (prn) REFERENCES student_auth(prn)
);

CREATE TABLE fee_matrix (
    year YEAR(4) NOT NULL,    
    category VARCHAR(100) NOT NULL,
    fee int NOT NULL
);

INSERT INTO fee_matrix(year, category, fee) 
VALUES 
    (2021, "OPEN", 108850),
    (2021, "OBC", 61506),
    (2021, "SEBC", 61506),
    (2021, "EWS", 61506),
    (2021, "EBC", 61506),
    (2021, "SC", 1850),
    (2021, "ST", 1850),
    (2021, "VJNT", 14161),
    (2021, "SBC", 14161),
    (2021, "TFWS", 14161),
    (2021, "J & K", 26180),
    (2021, "GOI", 26180),
    (2021, "JKSSS", 2180),
    (2020, "OPEN", 121270),
    (2020, "OBC", 67795),
    (2020, "SEBC", 67795),
    (2020, "EWS", 67795),
    (2020, "EBC", 67795),
    (2020, "SC", 1270),
    (2020, "ST", 1270),
    (2020, "VJNT", 14319),
    (2020, "SBC", 14319),
    (2020, "TFWS", 14319),
    (2020, "J & K", 25100),
    (2020, "GOI", 25100),
    (2020, "JKSSS", 1100),
    (2019, "OPEN", 121270),
    (2019, "OBC", 67795),
    (2019, "SEBC", 67795),
    (2019, "EWS", 67795),
    (2019, "EBC", 67795),
    (2019, "SC", 1270),
    (2019, "ST", 1270),
    (2019, "VJNT", 14319),
    (2019, "SBC", 14319),
    (2019, "TFWS", 14319),
    (2019, "J & K", 25100),
    (2019, "GOI", 25100),
    (2019, "JKSSS", 1100);

CREATE INDEX idx_student_data_app_id ON student_data(application_id);

CREATE INDEX idx_student_data_prn ON student_data(prn);
