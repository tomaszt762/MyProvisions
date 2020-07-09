provider "aws" {
  region                      = "us-west-2"
  skip_credentials_validation = true
  skip_requesting_account_id  = true
  skip_metadata_api_check     = true
  s3_force_path_style         = true
  access_key                  = "anaccesskey"
  secret_key                  = "asecretkey"

  endpoints {
    s3       = "http://localhost:4566"
    dynamodb = "http://localhost:4566"
  }

}

resource "aws_dynamodb_table" "first_dynamodb_table" {
  name           = "GameScores"
  billing_mode   = "PROVISIONED"
  read_capacity  = 10
  write_capacity = 10

  hash_key  = "UserId"
  range_key = "GameTitle"

  attribute {
    name = "UserId"
    type = "S"
  }

  attribute {
    name = "GameTitle"
    type = "S"
  }

  attribute {
    name = "TopScore"
    type = "N"
  }

  ttl {
    attribute_name = "TimeToExists"
    enabled        = false
  }

  global_secondary_index {
    hash_key           = "GameTitle"
    name               = "GameTitleIndex"
    projection_type    = "INCLUDE"
    range_key          = "TopScore"
    read_capacity      = 10
    write_capacity     = 10
    non_key_attributes = ["UserId"]
  }

  tags = {
    Name = "GameScores"
    Type = "Game"
  }
}