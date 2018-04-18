import java.awt.EventQueue;

import javax.swing.JFrame;
import javax.swing.JPanel;
import javax.swing.border.EmptyBorder;
import com.jgoodies.forms.layout.FormLayout;
import com.jgoodies.forms.layout.ColumnSpec;
import com.jgoodies.forms.layout.RowSpec;
import com.jgoodies.forms.layout.FormSpecs;
import javax.swing.JLabel;
import javax.swing.JButton;
import javax.swing.JTextField;

public class addAppointment extends JFrame {

	/**
	 * 
	 */
	private static final long serialVersionUID = 1L;
	private JPanel contentPane;
	private JTextField textField;
	private JTextField textField_1;
	private JTextField textField_2;
	private JTextField textField_3;
	private JTextField textField_4;
	private JTextField textField_5;
	private JTextField textField_6;

	/**
	 * Launch the application.
	 */
	public static void main(String[] args) {
		EventQueue.invokeLater(new Runnable() {
			public void run() {
				try {
					addAppointment frame = new addAppointment();
					frame.setVisible(true);
				} catch (Exception e) {
					e.printStackTrace();
				}
			}
		});
	}

	/**
	 * Create the frame.
	 */
	public addAppointment() {
		setTitle("Add Service Appointment");
		setDefaultCloseOperation(JFrame.EXIT_ON_CLOSE);
		setBounds(100, 100, 450, 300);
		contentPane = new JPanel();
		contentPane.setBorder(new EmptyBorder(5, 5, 5, 5));
		setContentPane(contentPane);
		contentPane.setLayout(new FormLayout(new ColumnSpec[] {
				FormSpecs.RELATED_GAP_COLSPEC,
				FormSpecs.DEFAULT_COLSPEC,
				FormSpecs.RELATED_GAP_COLSPEC,
				FormSpecs.DEFAULT_COLSPEC,
				FormSpecs.RELATED_GAP_COLSPEC,
				ColumnSpec.decode("default:grow"),},
			new RowSpec[] {
				FormSpecs.RELATED_GAP_ROWSPEC,
				FormSpecs.DEFAULT_ROWSPEC,
				FormSpecs.RELATED_GAP_ROWSPEC,
				FormSpecs.DEFAULT_ROWSPEC,
				FormSpecs.RELATED_GAP_ROWSPEC,
				FormSpecs.DEFAULT_ROWSPEC,
				FormSpecs.RELATED_GAP_ROWSPEC,
				FormSpecs.DEFAULT_ROWSPEC,
				FormSpecs.RELATED_GAP_ROWSPEC,
				FormSpecs.DEFAULT_ROWSPEC,
				FormSpecs.RELATED_GAP_ROWSPEC,
				FormSpecs.DEFAULT_ROWSPEC,
				FormSpecs.RELATED_GAP_ROWSPEC,
				FormSpecs.DEFAULT_ROWSPEC,
				FormSpecs.RELATED_GAP_ROWSPEC,
				FormSpecs.DEFAULT_ROWSPEC,
				FormSpecs.RELATED_GAP_ROWSPEC,
				FormSpecs.DEFAULT_ROWSPEC,
				FormSpecs.RELATED_GAP_ROWSPEC,
				FormSpecs.DEFAULT_ROWSPEC,}));
		
		JLabel lblCustomerName = new JLabel("Customer Name:");
		contentPane.add(lblCustomerName, "4, 4, right, default");
		
		textField = new JTextField();
		contentPane.add(textField, "6, 4, fill, default");
		textField.setColumns(10);
		
		JLabel lblCustomerTel = new JLabel("Customer Tel:");
		contentPane.add(lblCustomerTel, "4, 6, right, default");
		
		textField_1 = new JTextField();
		contentPane.add(textField_1, "6, 6, fill, default");
		textField_1.setColumns(10);
		
		JLabel lblCarMake = new JLabel("Car Make:");
		contentPane.add(lblCarMake, "4, 8, right, default");
		
		textField_5 = new JTextField();
		contentPane.add(textField_5, "6, 8, fill, default");
		textField_5.setColumns(10);
		
		JLabel lblCarModel = new JLabel("Car Model:");
		contentPane.add(lblCarModel, "4, 10, right, default");
		
		textField_6 = new JTextField();
		contentPane.add(textField_6, "6, 10, fill, default");
		textField_6.setColumns(10);
		
		JLabel lblCarReg = new JLabel("Car Reg:");
		contentPane.add(lblCarReg, "4, 12, right, default");
		
		textField_2 = new JTextField();
		contentPane.add(textField_2, "6, 12, fill, default");
		textField_2.setColumns(10);
		
		JLabel lblDate = new JLabel("Date:");
		contentPane.add(lblDate, "4, 14, right, default");
		
		textField_3 = new JTextField();
		contentPane.add(textField_3, "6, 14, fill, default");
		textField_3.setColumns(10);
		
		JLabel lblTime = new JLabel("Time:");
		contentPane.add(lblTime, "4, 16, right, default");
		
		textField_4 = new JTextField();
		contentPane.add(textField_4, "6, 16, fill, default");
		textField_4.setColumns(10);
		
		JButton btnValidateAppointment = new JButton("Validate Appointment");
		contentPane.add(btnValidateAppointment, "4, 20");
	}

}
