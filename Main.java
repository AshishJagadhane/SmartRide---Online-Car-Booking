import java.sql.*;

public class Main {
    public static void main(String[] args) {
        try {
            Class.forName("org.postgresql.Driver");

            Connection con = DriverManager.getConnection(
                "jdbc:postgresql://localhost:5432/smartride",
                "postgres",
                "root"
            );

            Statement st = con.createStatement();
            ResultSet rs = st.executeQuery("SELECT * FROM cars");

            while(rs.next()) {
                System.out.println(rs.getString("car_name"));
            }

            con.close();
        } catch(Exception e) {
            System.out.println(e);
        }
    }
}