package com.example.platon_backend;

import android.app.ProgressDialog;
import android.os.AsyncTask;
import android.os.Bundle;
import androidx.appcompat.app.AppCompatActivity;
import androidx.compose.ui.text.intl.Locale;

import android.text.method.ScrollingMovementMethod;
import android.util.Log;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;
import android.widget.TextView;

import java.text.DateFormat;
import java.text.SimpleDateFormat;
import java.util.Date;

import java.io.BufferedReader;

import java.io.InputStream;
import java.io.InputStreamReader;
import java.io.OutputStream;

import java.net.HttpURLConnection;
import java.net.URL;
import java.util.TimeZone;

public class MainActivity extends AppCompatActivity {

    private static String IP_ADDRESS = "34.64.113.235";
    private static String TAG = "Server Interworking";

    private EditText name;
    private EditText code;
    private EditText division;
    private EditText phoneNo;
    private EditText address;
//    private EditText mEditTextbat_level;
//    private TextView mTextViewResult;


    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);

        name = (EditText)findViewById(R.id.temp1);
        code = (EditText)findViewById(R.id.temp5);
        division = (EditText)findViewById(R.id.temp2);
        phoneNo = (EditText)findViewById(R.id.temp3);
        address = (EditText)findViewById(R.id.temp4);

        Button buttonInsert = (Button)findViewById(R.id.button_main_insert);
        buttonInsert.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {

                String name_s = name.getText().toString();
                String code_s = code.getText().toString();
                String division_s = division.getText().toString();
                String phoneNo_s = phoneNo.getText().toString();
                String address_s = address.getText().toString();

                InsertData task = new InsertData();
                task.execute("http://" + IP_ADDRESS + "/insert_student.php", name_s, code_s, division_s, phoneNo_s, address_s);

                name.setText("");
                code.setText("");
                division.setText("");
                phoneNo.setText("");
                address.setText("");
            }
        });

    }

    class InsertData extends AsyncTask<String, Void, String>{
        ProgressDialog progressDialog;

        @Override
        protected void onPreExecute() {
            super.onPreExecute();

            progressDialog = ProgressDialog.show(MainActivity.this,
                    "Please Wait", null, true, true);
        }


        @Override
        protected void onPostExecute(String result) {
            super.onPostExecute(result);

            progressDialog.dismiss();
//            mTextViewResult.setText(result);
            Log.d(TAG, "POST response  - " + result);
        }


        @Override
        protected String doInBackground(String... params) {

            String name_s = (String)params[1];
            String code_s = (String)params[2];
            String division_s = (String)params[3];
            String phoneNo_s = (String)params[4];
            String address_s = (String)params[5];


            String serverURL = (String)params[0];
            String postParameters = "name_s=" + name_s + "&code_s=" + code_s + "&division_s="
                    + division_s + "&phoneNo_s=" + phoneNo_s + "&address_s=" + address_s;


            try {

                URL url = new URL(serverURL);
                HttpURLConnection httpURLConnection = (HttpURLConnection) url.openConnection();


                httpURLConnection.setReadTimeout(5000);
                httpURLConnection.setConnectTimeout(5000);
                httpURLConnection.setRequestMethod("POST");
                httpURLConnection.connect();


                OutputStream outputStream = httpURLConnection.getOutputStream();
                outputStream.write(postParameters.getBytes("UTF-8"));
                outputStream.flush();
                outputStream.close();


                int responseStatusCode = httpURLConnection.getResponseCode();
                Log.d(TAG, "POST response code - " + responseStatusCode);

                InputStream inputStream;
                if(responseStatusCode == HttpURLConnection.HTTP_OK) {
                    inputStream = httpURLConnection.getInputStream();
                }
                else{
                    inputStream = httpURLConnection.getErrorStream();
                }


                InputStreamReader inputStreamReader = new InputStreamReader(inputStream, "UTF-8");
                BufferedReader bufferedReader = new BufferedReader(inputStreamReader);

                StringBuilder sb = new StringBuilder();
                String line = null;

                while((line = bufferedReader.readLine()) != null){
                    sb.append(line);
                }


                bufferedReader.close();


                return sb.toString();


            } catch (Exception e) {

                Log.d(TAG, "InsertData: Error ", e);

                return new String("Error: " + e.getMessage());
            }

        }
    }

}