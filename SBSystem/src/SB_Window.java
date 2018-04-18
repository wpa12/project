import java.awt.EventQueue;

import javax.swing.JFrame;
import com.jgoodies.forms.layout.FormLayout;
import com.jgoodies.forms.layout.ColumnSpec;
import com.jgoodies.forms.layout.RowSpec;
import com.jgoodies.forms.layout.FormSpecs;
import javax.swing.JButton;
import javax.swing.JTextField;
import javax.swing.SpringLayout;
import javax.swing.JLabel;
import javax.swing.AbstractAction;
import java.awt.event.ActionEvent;
import javax.swing.Action;
import java.awt.event.ActionListener;

public class SB_Window {

	private JFrame frame , servicePan, managementPane, DBvariablePane, AdimOptionPane, WorkshopPane;
	private final Action action = new SwingAction();

	/**
	 * Launch the application.
	 */
	public static void main(String[] args) {
		EventQueue.invokeLater(new Runnable() {
			public void run() {
				try {
					SB_Window window = new SB_Window();
					window.frame.setVisible(true);
				} catch (Exception e) {
					e.printStackTrace();
				}
			}
		});
	}

	/**
	 * Create the application.
	 */
	public SB_Window() {
		initialize();
	}

	/**
	 * Initialize the contents of the frame.
	 */
	private void initialize() {
		frame = new JFrame();
		frame.setTitle("Successful Brothers Option Windows");
		frame.setBounds(100, 100, 450, 300);
		frame.setDefaultCloseOperation(JFrame.EXIT_ON_CLOSE);
		SpringLayout springLayout = new SpringLayout();
		frame.getContentPane().setLayout(springLayout);
		
		JButton btnServiceCoordination = new JButton("Service Coordination");
		btnServiceCoordination.addActionListener(new ActionListener() {
			public void actionPerformed(ActionEvent arg0) {
				//Service coordination button action;
			}
		});
		btnServiceCoordination.setAction(action);
		btnServiceCoordination.setToolTipText("Select to Manage vehicle Servicing");
		springLayout.putConstraint(SpringLayout.NORTH, btnServiceCoordination, 31, SpringLayout.NORTH, frame.getContentPane());
		springLayout.putConstraint(SpringLayout.WEST, btnServiceCoordination, 6, SpringLayout.WEST, frame.getContentPane());
		frame.getContentPane().add(btnServiceCoordination);
		
		JButton btnManagementReports = new JButton("Management Reports");
		btnManagementReports.setToolTipText("Create, Collate Management Reports such as productivity and financial");
		springLayout.putConstraint(SpringLayout.EAST, btnServiceCoordination, 0, SpringLayout.EAST, btnManagementReports);
		springLayout.putConstraint(SpringLayout.NORTH, btnManagementReports, 60, SpringLayout.NORTH, frame.getContentPane());
		springLayout.putConstraint(SpringLayout.WEST, btnManagementReports, 6, SpringLayout.WEST, frame.getContentPane());
		springLayout.putConstraint(SpringLayout.EAST, btnManagementReports, 183, SpringLayout.WEST, frame.getContentPane());
		frame.getContentPane().add(btnManagementReports);
		
		JButton btnDatabaseVariables = new JButton("Database Variables");
		springLayout.putConstraint(SpringLayout.SOUTH, btnDatabaseVariables, -10, SpringLayout.SOUTH, frame.getContentPane());
		springLayout.putConstraint(SpringLayout.EAST, btnDatabaseVariables, -10, SpringLayout.EAST, frame.getContentPane());
		frame.getContentPane().add(btnDatabaseVariables);
		
		JLabel lblWelcome = new JLabel("Welcome <<name of user>>");
		springLayout.putConstraint(SpringLayout.WEST, lblWelcome, 10, SpringLayout.WEST, frame.getContentPane());
		springLayout.putConstraint(SpringLayout.SOUTH, lblWelcome, -6, SpringLayout.NORTH, btnServiceCoordination);
		frame.getContentPane().add(lblWelcome);
		
		JButton btnWorkshopManagement = new JButton("Workshop Management");
		springLayout.putConstraint(SpringLayout.NORTH, btnWorkshopManagement, 6, SpringLayout.SOUTH, btnManagementReports);
		springLayout.putConstraint(SpringLayout.WEST, btnWorkshopManagement, 0, SpringLayout.WEST, btnServiceCoordination);
		springLayout.putConstraint(SpringLayout.EAST, btnWorkshopManagement, 0, SpringLayout.EAST, btnServiceCoordination);
		frame.getContentPane().add(btnWorkshopManagement);
		
		JButton btnAdminOptions = new JButton("Admin Options");
		springLayout.putConstraint(SpringLayout.WEST, btnAdminOptions, 0, SpringLayout.WEST, btnDatabaseVariables);
		springLayout.putConstraint(SpringLayout.SOUTH, btnAdminOptions, -5, SpringLayout.NORTH, btnDatabaseVariables);
		frame.getContentPane().add(btnAdminOptions);
		
		JButton btnManageEmployee = new JButton("Manage Employee");
		springLayout.putConstraint(SpringLayout.NORTH, btnManageEmployee, 6, SpringLayout.SOUTH, btnWorkshopManagement);
		springLayout.putConstraint(SpringLayout.WEST, btnManageEmployee, 0, SpringLayout.WEST, btnServiceCoordination);
		springLayout.putConstraint(SpringLayout.EAST, btnManageEmployee, 0, SpringLayout.EAST, btnServiceCoordination);
		frame.getContentPane().add(btnManageEmployee);
		
		JButton btnManageCustomer = new JButton("Manage Customer");
		springLayout.putConstraint(SpringLayout.NORTH, btnManageCustomer, 6, SpringLayout.SOUTH, btnManageEmployee);
		springLayout.putConstraint(SpringLayout.WEST, btnManageCustomer, 0, SpringLayout.WEST, btnServiceCoordination);
		springLayout.putConstraint(SpringLayout.EAST, btnManageCustomer, 0, SpringLayout.EAST, btnServiceCoordination);
		btnManageCustomer.addActionListener(new ActionListener() {
			public void actionPerformed(ActionEvent arg0) {
			}
		});
		frame.getContentPane().add(btnManageCustomer);
		
		JButton btnPartsManagement = new JButton("Parts Management");
		springLayout.putConstraint(SpringLayout.NORTH, btnPartsManagement, 6, SpringLayout.SOUTH, btnManageCustomer);
		springLayout.putConstraint(SpringLayout.WEST, btnPartsManagement, 0, SpringLayout.WEST, btnServiceCoordination);
		springLayout.putConstraint(SpringLayout.EAST, btnPartsManagement, 0, SpringLayout.EAST, btnServiceCoordination);
		frame.getContentPane().add(btnPartsManagement);
	}
	private class SwingAction extends AbstractAction {
		public SwingAction() {
			putValue(NAME, "Service Coordination");
			putValue(SHORT_DESCRIPTION, "Some short description");
		
			
		}
		public void actionPerformed(ActionEvent e) {
		}
	}
}
