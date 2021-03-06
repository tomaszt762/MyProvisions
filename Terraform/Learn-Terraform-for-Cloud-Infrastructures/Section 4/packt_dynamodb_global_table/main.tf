provider "aws" {
  alias = "us-west-2"
  region = "us-west-2"
  skip_credentials_validation = true
  skip_requesting_account_id  = true
  skip_metadata_api_check     = true
  s3_force_path_style         = true
  access_key                  = "anaccesskey"
  secret_key                  = "asecretkey"

  endpoints {
    dynamodb = "http://localhost:4566"
  }
}

provider "aws" {
  alias = "us-east-1"
  region = "us-east-1"
  skip_credentials_validation = true
  skip_requesting_account_id  = true
  skip_metadata_api_check     = true
  s3_force_path_style         = true
  access_key                  = "anaccesskey"
  secret_key                  = "asecretkey"

  endpoints {
    dynamodb = "http://localhost:4566"
  }
}

resource "aws_dynamodb_table" "us-east-1" {
  provider = aws.us-east-1

  hash_key = "myAttribute"
  name = "myTable"
  stream_enabled = true
  stream_view_type = "NEW_AND_OLD_IMAGES"
  read_capacity = 10
  write_capacity = 10

  attribute {
    name = "myAttribute"
    type = "S"
  }
}

resource "aws_dynamodb_table" "us-west-2" {
  provider = aws.us-west-2

  hash_key = "myAttribute"
  name = "myTable"
  stream_enabled = true
  stream_view_type = "NEW_AND_OLD_IMAGES"
  read_capacity = 10
  write_capacity = 10

  attribute {
    name = "myAttribute"
    type = "S"
  }
}

resource "aws_dynamodb_global_table" "myTable" {
  depends_on = [aws_dynamodb_table.us-east-1, aws_dynamodb_table.us-west-2]
  name = "myTable"
  provider = aws.us-east-1

  replica {
    region_name = "us-west-2"
  }

  replica {
    region_name = "us-east-1"
  }
}